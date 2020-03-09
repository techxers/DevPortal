@extends('layouts/landing-layoutMaster')

@section('title', 'Forgot Password')


@section('content')

    <div class="site-blocks-cover overlay"
         style="background-image: url({{asset("img/hero-landing.png")}});position: absolute;top: 0%; bottom: 0; left: 0;right: 0;"
         data-aos="fade"
         id="home-section"></div>
    @include('panels/landing-navbar')
    <div class="container login"
         style="position: absolute;top: 15%; bottom: 0; left: 0;right: 0;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card pt-4 pb-3 text-white"
                     style="background-color:rgba(0,0,0,0.51);background-blend-mode: color; background-image: url({{asset("img/hero-login.png")}});width: 90%;border-radius: 24px!important; background-size: contain;">
                    <div class="card-body pb-8 pt-8">
                        <h3 class="text-center shadow pb-4 text-uppercase">{{ __('Reset Password') }}</h3>


                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

