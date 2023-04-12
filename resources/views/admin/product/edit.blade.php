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
                    <form method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Category Name</label>
                            <input type="text" class="form-control" name="name" id="basic-default-fullname" value="{{ $category->name }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <textarea type="text" class="form-control" name="description" id="basic-default-company">{{ $category->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Iamge</label>
                            <input type="file" id="basic-default-phone" class="form-control phone-mask"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
