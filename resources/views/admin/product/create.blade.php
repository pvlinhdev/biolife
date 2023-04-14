@extends('admin.master')
@section('title', __('Admin Product'))

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
            <div class="card-body row">
                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data" data-parsley-validate 
                     >   {{-- id="create-product-form"> --}}
                    @csrf
                    <div class="mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label class="form-label" for="basic-default-fullname">Product Name</label>
                        <input type="text" class="form-control" required name="name" id="basic-default-fullname" value="{{ old('name') }}" />
                        @if($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3 {{ $errors->has('description') ? 'has-error' : ''}}">
                        <label class="form-label" for="basic-default-company">Description</label>
                        <textarea type="text" class="form-control" required name="description" id="basic-default-company">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label class="form-label" for="basic-default-company">Quantity</label>
                            <input type="number" class="form-control" minlength="1" required maxlength="100" name="quantity" id="basic-default-company" value="{{ old('quantity') }}">
                            
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label class="form-label" for="basic-default-company">Price Product</label>
                            <input type="number"  minlength="0" maxlength="" required class="form-control" name="price" id="basic-default-company" value="{{ old('price') }}">
                        </div>
                        <div class="mb-3 col-lg-4 ">
                            <label class="form-label" for="basic-default-company">Price Product</label>
                            <input type="number"  minlength="0" maxlength="" required class="form-control" name="price_cost" id="basic-default-company" value="{{ old('price_cost')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-lg-6 ">
                            <label class="form-label" for="basic-default-company">sold</label>
                            <input type="number"  minlength="0" maxlength=""  class="form-control" name="sold" id="basic-default-company" value="{{ old('sold')}}">
                        </div>
                        <div class="mb-3 col-lg-6 ">
                            <label class="form-label" for="basic-default-company">views</label>
                            <input type="number"  minlength="0" maxlength="" class="form-control" name="views" id="basic-default-company" value="{{ old('views')}}">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Iamge</label>
                        <input type="file" name="file_upload" id="basic-default-phone" class="form-control phone-mask"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-phone">Category</label>
                        <select class="form-control" name="category_id" >
                            @foreach($categoryList as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#create-product-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                alert('Thêm sản phẩm thành công');
                window.location.href = '{{ route("admin.product.index") }}';
            },
            error: function(response) {
                alert('Thêm sản phẩm thất bại. Vui lòng thử lại sau.');
            }
        });
    });
});
</script>
@endsection
