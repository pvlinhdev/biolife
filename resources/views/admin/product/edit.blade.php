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
                    <form method="post" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data" 
                        id="#update-product-form">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Product Name</label>
                            <input type="text" class="form-control" name="name" id="basic-default-fullname" value="{{ $product->name }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <textarea type="text" class="form-control" name="description" id="basic-default-company">{{ $product->description }}</textarea>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-4">
                                <label class="form-label" for="basic-default-company">Quantity</label>
                                <input type="number" class="form-control" minlength="1" required maxlength="100" name="quantity" id="basic-default-company" value="{{ $product->quantity }}">
                                
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="form-label" for="basic-default-company">Price Product</label>
                                <input type="number"  minlength="0" maxlength="" required class="form-control" name="price" id="basic-default-company" value="{{ $product->price }}">
                            </div>
                            <div class="mb-3 col-lg-4 ">
                                <label class="form-label" for="basic-default-company">Price Product</label>
                                <input type="number"  minlength="0" maxlength="" required class="form-control" name="price_cost" id="basic-default-company" value="{{ $product->price_cost }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6 ">
                                <label class="form-label" for="basic-default-company">sold</label>
                                <input type="number"  minlength="0" maxlength=""  class="form-control" name="sold" id="basic-default-company" value="{{ $product->sold }}">
                            </div>
                            <div class="mb-3 col-lg-6 ">
                                <label class="form-label" for="basic-default-company">views</label>
                                <input type="number"  minlength="0" maxlength="" class="form-control" name="views" id="basic-default-company" value="{{ $product->views }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Iamge</label>
                            <input type="file" name="file_upload" id="basic-default-phone" class="form-control phone-mask" value="{{ $product->image }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Category</label>
                            <select class="form-control" name="category_id" value="{{ $product->category_id }}" >
                                @foreach($categoryList as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection
