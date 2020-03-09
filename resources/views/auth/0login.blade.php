@extends('layouts/landing-layoutMaster')

@section('title', 'VMS Portal')


@section('content')

    <div class="site-blocks-cover overlay"
         style="background-image: url({{asset("img/hero-landing.png")}});position: absolute;top: 0%; bottom: 0; left: 0;right: 0;"
         data-aos="fade"
         id="home-section"></div>
    <div class="container login"
         style="position: absolute;top: 15%; bottom: 0; left: 0;right: 0;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card pt-4 pb-3 text-white bg-transparent" style="background-image: url({{asset("img/hero-login.png")}});width: 90%;border-radius: 48px!important; background-size: contain;">

                    <div class="card-body">
                        <h3 class="text-center shadow pb-4 text-uppercase">Sign in to access the portal</h3>
                        <form method="POST" action="{{ route('login') }}"
                              class="pl-5 pr-5 justify-content-center text-center align-content-center">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="">{{ __('E-Mail Address') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                        <span class="input-group-text"
                              style=""><i
                                    class="feather  icon-mail_outline" style="font-size:20px;padding-left: 4px!important;padding-right: 4px!important;"></i></span>
                                    </div>
                                    <input id="email" type="email"
                                           class=" p-2 form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus
                                           placeholder="Enter Email Address" style="border-radius: 2px!important;">

                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="">{{ __('Password') }}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                        <span class="input-group-text"><i
                                    class="feather icon-lock_outline" style="font-size:20px;padding-left: 4px!important;padding-right: 4px!important;"></i></span>
                                    </div>
                                    <input id="password" type="password"
                                           class=" p-2 form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="Enter password"
                                           required autocomplete="current-password" style="border-radius: 2px!important;">
                                </div>


                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="full-btn w60 text-center col-12">
                                    <button type="submit" class="btn btn-danger  btn-block btn-hover"
                                            style="font-size: 16px;border-radius: 30px;padding: 10px 30px;">
                                        {{ __('LOGIN') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection