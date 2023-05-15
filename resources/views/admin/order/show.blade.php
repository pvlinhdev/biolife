@extends('admin.master')
@section('title', __('Admin Order'))
@section('style')
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
@endsection
@section('content')
    <!-- Hoverable Table rows -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row cart_table mb-5">
            <h4 class="fw-bold py-3 mb-4 col-md-8"><span class="text-muted fw-light">Tables /</span> Order Items |
                <small>#{{ $item->code }}</small> | <small>{{ $item->created_at }}</small>
            </h4>
            <div class="col-md-4 mb-3 mt-2">
                <form class="d-flex" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7">
                <div class="card mb-3">
                    <div class="table-responsive text-nowrap mt-2">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 100px">User</th>
                                    <th style="width: 300px">Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 " class="show-products">
                                @foreach ($order->orderDetails as $detail)
                                    <tr>
                                        <td style="width: 100px">
                                            <img src="{{ asset('uploads/products/' . $detail->product->image) }}"
                                                width="100" height="100" alt="img">
                                        </td>
                                        <td style="width: 300px"> <strong>{{ $detail->product->name }}</strong><br>
                                            <small>Cat: {{ $detail->product->category->name }}</small>
                                        </td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>giá</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <table class="table table-hover">
                            <thead>
                            </thead>
                            <tbody class="table-border-bottom-0 " class="show-products">
                                <tr>
                                    <td>Subtotal</td>
                                    <td></td>
                                    <td></td>
                                    <td>$700</td>
                                </tr>
                                <tr>
                                    <td>Shopping</td>
                                    <td></td>
                                    <td></td>
                                    <td>$0</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td>$0</td>
                                </tr>
                                <tr>
                                    <td>Total PRice</td>
                                    <td></td>
                                    <td></td>
                                    <td>$700</td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-5 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9">
                                <h2 class="card-title mb-3">Summary</h2>
                                <h5 class="card-title">Shipping Address</h5>
                                <p class="card-text text-muted">Name: {{ $item->receivership->name }}</p>
                                <p class="card-text text-muted">
                                    Phone: {{ $item->receivership->phone }}
                                </p>
                                <p class="card-text text-muted">
                                    Address: {{ $item->receivership->address }}
                                </p>
                                <a href="javascript:void(0)"class="card-link">Track Order</a> 
                                <a href="{{ route('order.edit', $order->id) }}"class="card-link">Edit Order</a>
                            </div>
                            <div class="col-xl-3">
                                <div class="status">
                                    <p>{{$item->status}}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
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
    {{-- delete --}}
@endsection
