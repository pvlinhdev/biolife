@extends('admin.master')
@section('title', __('Admin Category'))

@section('content')
    <!-- Hoverable Table rows -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row cart_table mb-5">
            <h4 class="fw-bold py-3 mb-4 col-md-8"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
            <div class="col-md-4 mb-3 mt-2">
                <form class="d-flex" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                <div class="" style="text-align: right">
                    {{-- <small class="text-light fw-semibold">Category</small> --}}
                    <div class="buttoncreate">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                            Create User
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true" aria-labelledby="modalCenter">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Create User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.user.store') }}"
                                        enctype="multipart/form-data" id="create-user-form">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name  <span class="requite">*</span></label>
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        placeholder="Enter Name" name="name" required="required"
                                                        value="{{ old('name') }}" />
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="descriptionWithTitle" class="form-label">Email  <span class="requite">*</span> </label>
                                                    <input type="email" id="email" class="form-control" placeholder="... @gmail.com " name="email"
                                                        required="required" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="form-password-toggle">
                                                    <label class="form-label" for="basic-default-password12">Password <span class="requite">*</span></label>
                                                    <div class="input-group">
                                                      <input
                                                        name="password"
                                                        value="{{ old('password') }}"
                                                        required
                                                        type="password"
                                                        class="form-control"
                                                        id="basic-default-password12"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        aria-describedby="basic-default-password2"
                                                      />
                                                      <span id="basic-default-password2" class="input-group-text cursor-pointer"
                                                        ><i class="bx bx-hide"></i
                                                      ></span>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="row g-2">
                                                <label class="form-label" for="basic-default-phone">Iamge</label>
                                                <input type="file" id="basic-default-phone" class="form-control phone-mask" />
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </h5>
            <div class="table-responsive text-nowrap mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($userList as $user)
                            <tr>
                                <td>
                                    img
                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email }}</td>

                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.user.edit', $user->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>

                                            <form method="post" action="{{ route('admin.user.destroy', $user->id) }}"
                                                class="delete-user">
                                            @method('delete')
                                                @csrf
                                                <a  class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                <button type="submit" data-id="{{ $user->id }}" class="btn">Delete </button></a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- phân trang --}}
                <div class="mt-4" style="text-align: right;">
                    {{$userList->links()}}
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('script')
{{-- create --}}
<script>
    $(document).ready(function() {
    $('#create-user-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                alert('Thêm user thành công');
                window.location.href = '{{ route("admin.user.index") }}';
            },
            error: function(response) {
                alert('Thêm user thất bại. Vui lòng thử lại sau.');
            }
        });
    });
});
</script>
{{-- delete --}}
<script>
    $(document).ready(function() {
    $('.delete-user').submit(function(event) {
        event.preventDefault();
        var url = $(this).attr('action');
        if (confirm('Bạn có chắc chắn muốn xoá người dùng này không?')) {
            $.ajax({
                type: 'DELETE',
                url: url,
                success: function(response) {
                alert('Xoá người dùng thành công');
                window.location.href = '{{ route("admin.user.index") }}';
                },
                error: function(response) {
                    alert('Xoá người dùng thất bại. Vui lòng thử lại sau.');
                }
                });
        }
    });
});
</script>


@endsection
