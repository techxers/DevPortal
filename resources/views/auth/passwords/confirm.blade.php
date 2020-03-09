<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Confirm your password</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{asset('custom/custom3/css.css')}}" rel="stylesheet">
    <link href="{{asset('custom/custom3/app.css')}}" rel="stylesheet">
    <link href="{{asset('custom/custom3/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('custom/custom3/custom.css')}}" rel="stylesheet">
    <!-- ================== END BASE CSS STYLE ================== -->

</head>
<body class="pace-top">
<!-- begin #page-loader -->

<!-- end #page-loader -->
<!-- begin #page-container -->
<div id="page-container" class="">
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url({{asset('img/parallax-bg.png')}});"></div>

        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">


            <!-- begin right-content -->
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand">
                    <a href="{{route('landing')}}">
                        <img src="{{asset('img/logo-landing.png')}}" class="w-100" style="max-width: 150px">
                    </a>
                </div>
                <div class="icon">

                </div>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                <div class="">
                    <h3 class="text-center shadow pb-4 text-uppercase">{{ __('Confirm Password') }}</h3>

                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-offset-2 col-md-10">

                                <input type="submit" class="btn btn-default" value=" {{ __('Confirm Password') }}">


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->

</div>
<!-- end page container -->
<!-- ================== BEGIN BASE JS ================== -->
<script src="{{asset('custom/custom3/jquery')}}"></script>

<script src="{{asset('custom/custom3/bootstrap')}}"></script>

<script src="{{asset('custom/custom3/default.js')}}"></script>
<script src="{{asset('custom/custom3/sweetalert.js')}}"></script>
<!-- ================== END BASE JS ================== -->

<script src="{{asset('custom/custom3/jqueryval')}}"></script>


</body>
</html>
