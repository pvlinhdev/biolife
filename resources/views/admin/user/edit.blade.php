@extends('admin.master')
@section('title', __('Admin Category'))
@section('stylesheet')
   
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data"
                        id="update-user-form">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">user Name</label>
                            <input type="text" class="form-control" name="name" id="basic-default-fullname"
                                value="{{ $user->name }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Email</label>
                            <input type="email" class="form-control" name="email" id="basic-default-company"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12" >Password</label>
                            <div class="input-group">
                              <input
                                name="password"
                                value="{{ $user->password }}"
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
                        {{-- <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <input type="password" class="form-control" name="password" id="basic-default-company" value="{{$user->password }}">
                        </div> --}}
                        <div class="mb-3 mt-3">
                            <label class="form-label" for="basic-default-phone">Iamge</label>
                            <input type="file" id="basic-default-phone" class="form-control phone-mask" />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#update-user-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Cập nhật người đung thành công');
                        window.location.href = '{{ route('admin.user.index') }}';
                    },
                    error: function(response) {
                        alert('Cập nhật người đung thất bại. Vui lòng thử lại sau.');
                    }
                });
            });
        });
    </script>


@endsection
