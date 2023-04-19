@extends('admin.master')
@section('title', __('Admin Product'))
@section('style')
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
@endsection
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
                        <a href="{{ route('admin.product.create') }}">
                            <button type="button"  class="btn btn-primary">
                                Create Productt
                            </button>
                        </a>
                        <!-- Modal -->
                    </div>
                </div>
            </h5>
            <div class="table-responsive text-nowrap mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Price Cost</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 " class="show-products">
                        @foreach ($productList as $pro)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/' . $pro->image) }}" width="100" height="100" alt="img-{{$pro->name}}">
                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $pro->name }}</strong>
                                </td>
                                <td>{{ $pro->quantity }}</td>
                                <td>{{ $pro->price }}</td>
                                <td>{{ $pro->sale_price }}</td>
                                <td>{{ $pro->category->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.product.edit', $pro->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>

                                            <form method="post"
                                                action="{{ route('admin.category.destroy', $pro->id) }}">
                                                @method('delete')
                                                @csrf
                                                <a class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                    <button type="submit" class="btn">Delete</button></a>
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
                    {{$productList->links()}}
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('script')
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
@endsection
