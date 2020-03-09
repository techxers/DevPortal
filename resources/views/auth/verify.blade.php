<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Verify Email</title>
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
                    <h4 class="">{{ __('Verify Your Email Address') }}</h4>

                    @if (session('resent'))
                        <div class="alert alert-success pt-2 pb-2" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                            <p>{{__("This is a custom text")}}</p>
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline " method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="col-md-offset-2 col-md-10 mt-3">
                        <input type="submit" class="btn btn-default" value="{{  __('click here to request another')  }}">
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




</body></html>