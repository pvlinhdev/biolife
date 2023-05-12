@extends('admin.master')
@section('title', __('Admin Category'))

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
                    <form id="demo-form2" method="post" action="{{ route('admin.permissions.update', $permissions->id) }}"
                        enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        @method('put')
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span
                                    class="required">*</span>
                            </label>
                            <div class="mb-3">
                                <input type="text" id="name" required="required" class="form-control" id="basic-default-fullname" 
                                    name="name" value="{{ $permissions->name }}">
                            </div>
                        </div>
                            <div class="ln_solid"></div>
                        <div class="item form-group mt-3">
                            <div class="">
                                <a href="{{ route('admin.permissions.index')}}"><button class="btn btn-primary" type="button">Cancel</button></a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#update-category-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                alert('Cập nhật danh mục thành công');
                window.location.href = '{{ route("admin.category.index") }}';
            },
            error: function(response) {
                alert('Cập nhật danh mục thất bại. Vui lòng thử lại sau.');
            }
        });
    });
});
</script>
    
@endsection
