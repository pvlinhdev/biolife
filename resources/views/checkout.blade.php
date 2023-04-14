@extends('master')
@section('title', __('Biolife - Checkout Cart'))

@section('content')
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>
    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>
    <div class="page-contain checkout">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                    <!--checkout progress box-->
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                                <li class="step 1st">
                                    <div class="checkout-act active">
                                        <h3 class="title-box"><span class="number">1</span>Customer</h3>
                                        <div class="box-content">
                                            <p class="txt-desc">Checking out as a <a class="pmlink"
                                                    href="#">Guest?</a> You’ll be able to save your details to create
                                                an account with us later.</p>
                                            <div class="login-on-checkout">
                                                <form action="{{ route('checkout.store', $user->id) }}" name="frm-login" method="post"
                                                    enctype="multipart/form-data" id="checkout-form">
                                                    @csrf
                                                    <input type="hidden" name="orderId" value="{{ $order->id }}">
                                                    <p class="form-row">
                                                        <label for="input_email">Name</label>
                                                        <input type="text" name="name" id="input_name" 
                                                            placeholder="Your name" {{ old('name') }}>
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_phone">Phone</label>
                                                        <input type="tel" name="phone" id="input_phone" {{ old('phone') }}
                                                            placeholder="Your phone">
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_email">Email Address</label>
                                                        <input type="email" name="email" id="input_email" {{ old('email') }}
                                                            placeholder="Your email">
                                                    </p>
                                                    <p class="form-row">
                                                    <div id="shipping-address">
                                                        <label for="address1">Địa chỉ 1:</label>
                                                        <input type="text" id="address1" name="address"><br>
                                                        <label for="address2">Địa chỉ 2:</label>
                                                        <input type="text" id="address2" name="address2"><br>
                                                        <label for="city">Thành phố:</label>
                                                        <input type="text" id="city" name="city"><br>
                                                        <label for="state">Tỉnh/Thành phố:</label>
                                                        <input type="text" id="state" name="state"><br>
                                                        <label for="zip">Mã bưu chính:</label>
                                                        <input type="text" id="zip" name="zip"><br>
                                                    </div>
                                                    {{-- <label for="input_email">Email Address</label>
                                                        <input type="email" name="email" id="input_email" value=""
                                                            placeholder="Your email"> --}}
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="input_note">Note</label>
                                                        <textarea type="text" name="note" id="input_note" value="" placeholder="Your note" style="width: 100%">{{ old('note') }}</textarea>
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="checkbox" name="subcribe" id="input_subcribe">
                                                        <label for="input_subcribe">Subscribe to our newsletter</label>
                                                    </p>
                                                   
                                                    <div class="form-row">
                                                        <button type="submit" class="btn">Checkout</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="step 2nd">
                                    <div class="checkout-act">
                                        <h3 class="title-box"><span class="number">2</span>Shipping</h3>
                                    </div>
                                </li>
                                <li class="step 3rd">
                                    <div class="checkout-act">
                                        <h3 class="title-box"><span class="number">3</span>Billing</h3>
                                    </div>
                                </li>
                                <li class="step 4th">
                                    <div class="checkout-act">
                                        <h3 class="title-box"><span class="number">4</span>Payment</h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div
                        class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Order Summary</h3>
                                <a href="#" class="link-forward">Edit cart</a>
                            </div>

                            <div class="cart-list-box short-type">
                                <span class="number">2 items</span>
                                <ul class="cart-list">
                                    @foreach ($order->orderDetails as $orderDetail)
                                        <li class="cart-elem">
                                            <div class="cart-item">
                                                <div class="product-thumb">
                                                    <a class="prd-thumb" href="#">
                                                        <figure><img
                                                                src="{{ asset('uploads/products/' . $orderDetail->product->image) }}"
                                                                width="113" height="113" alt="shop-cart"></figure>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <span class="txt-quantity">{{ $orderDetail->quantity }}X</span>
                                                    <a href="#"
                                                        class="pr-name">{{ $orderDetail->product->name }}</a>
                                                </div>
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span
                                                                class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal</b>
                                            <span class="stt-price">£{{ $total_price_order }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">£20.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Tax</b>
                                            <span class="stt-price">£0.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">total:</b>
                                            <span class="stt-price">£190.00</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const address1 = document.getElementById("address1").value;
        const address2 = document.getElementById("address2").value;
        const city = document.getElementById("city").value;
        const state = document.getElementById("state").value;
        const zip = document.getElementById("zip").value;
        document.getElementById("shipping-address").value = address;
        const address = `${address1}, ${address2}, ${city}, ${state} ${zip}`;
    </script>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('#checkout-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                alert('Checkout thành công');
                window.location.href = '{{ route("cart") }}';
            },
            error: function(response) {
                alert('Checkout thất bại. Vui lòng thử lại sau.');
            }
        });
    });
});
</script>
@endsection
