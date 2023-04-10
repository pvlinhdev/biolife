@extends('master')
@section('title', __("Biolife - Login"))

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
            <li class="nav-item"><span class="current-page">Authentication</span></li>
            <li class="nav-item"><span class="current-page">Login</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">

            <div class="row">

                <!--Form Sign In-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="{{ route('login') }}" name="frm-login" method="post">
                            @csrf
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" class="txt-input
                                @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password:<span class="requite">*</span></label>
                                <input type="password" id="fid-pass"class="txt-input
                                @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" type="submit">sign in</button>
                                @if (Route::has('password.request'))
                                    <a class="link-to-help" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </p>
                        </form>
                    </div>
                </div>

                <!--Go to Register form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title">New Customer?</h4>
                            <p class="sub-title">Create an account with us and you’ll be able to:</p>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
                            <a href="{{ route('register') }}" class="btn btn-bold">Create an account</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
