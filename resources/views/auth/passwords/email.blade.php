<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Forgot your password?</title>
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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" class="form-horizontal" method="post" role="form" novalidate="novalidate"><input name="__RequestVerificationToken" type="hidden" value="OxKRnDFWq8XYzvjaglsBBL3ohFSoxEotY4TS-BSG78BHJgH6Jy80vldsArfft9c1jhet614Gg1e-UYubfzN74E6s6Jd_55ABHprwIviuQrA1">
                    <h4>Enter your email-address.</h4>
                    @csrf
                    <hr>
                    <div class="validation-summary-valid text-danger" data-valmsg-summary="true"><ul><li style="display:none"></li>
                        </ul></div>        <div class="form-group">
                        <label class="col-md-2 control-label" for="Email">Email</label>
                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" class="btn btn-default" value="{{ __('Send Password Reset Link') }}">
                        </div>
                    </div>
                </form></div>

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




</body></html>