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
                            Create Category
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true" aria-labelledby="modalCenter">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Create Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.category.store') }}"
                                        enctype="multipart/form-data" id="create-category-form">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Name</label>
                                                    <input type="text" id="nameWithTitle" class="form-control"
                                                        placeholder="Enter Name" name="name" required="required"
                                                        value="{{ old('name') }}" />
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="descriptionWithTitle" class="form-label">Description</label>
                                                    <textarea type="text" id="descriptionWithTitle" class="form-control" placeholder="Decription ... " name="description"
                                                        required="required">{{ old('description') }}</textarea>
                                                </div>
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
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categoryList as $cat)
                            <tr>
                                <td>
                                    img
                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $cat->name }}</strong></td>
                                <td>{{ $cat->description }}</td>

                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.category.edit', $cat->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>

                                            <form method="post" action="{{ route('admin.category.destroy', $cat->id) }}"
                                                class="delete-category-btn">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('admin.category.destroy', $cat->id) }}" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                <button type="submit"> Delete</button>  </a>

                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#create-category-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                alert('Thêm danh mục thành công');
                window.location.href = '{{ route("admin.category.index") }}';
            },
            error: function(response) {
                alert('Thêm danh mục thất bại. Vui lòng thử lại sau.');
            }
        });
    });
});
</script>
<script>
    $(document).ready(function() {
    $('.delete-category-btn').submit(function(event) {
        event.preventDefault();
        var url = $(this).attr('action');
        if (confirm('Bạn có chắc chắn muốn xoá danh mục này không?')) {
            $.ajax({
                type: 'DELETE',
                url: url,
                success: function(response) {
                alert('Xoá danh mục thành công');
                window.location.href = '{{ route("admin.category.index") }}';
                },
                error: function(response) {
                    alert('Xoá danh mục thất bại. Vui lòng thử lại sau.');
                }
                });
        }
    });
});
</script>

@endsection
