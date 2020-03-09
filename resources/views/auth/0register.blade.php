@extends('layouts/landing-layoutMaster')

@section('title', 'Rent/Lease the VMS System')

@section('page-styles')
    {{-- Page css files --}}
    <!-- BEGIN: Theme CSS-->
    {{--
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
  --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-extended.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/colors.css"')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/formswizard.css')}}/">
    <!-- END: Page CSS-->

    <link rel="stylesheet" href="{{ asset('css/plugins/forms/wizard.css') }}">

    <style>
        .danger {
            color: #ea5455 !important;
        }

        h5 {
            text-shadow: 1px 1px 0 #444;
            color: white;
        }

        #registerForm-t-1, #registerForm-t-2, #registerForm-t-0 {
            text-shadow: 1px 1px 0 #ffffff !important;
        }

        .brand-blue {
            color: #ff1200;
        }
    </style>
@endsection

@section('content')


    <div class="site-blocks-cover overlay"
         style="background-image: url({{asset("img/hero-landing.png")}});position: absolute;top: -30%; bottom: 0; left: 0;right: 0;"
         data-aos="fade"
         id="home-section"></div>
    @include('panels/landing-navbar')
    <div class="app-content">
        <div class="content-wrapper">
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row" style="padding: 100px 5%!important;">
                    <div class="col-12">
                        <div class="card" style="background-color: rgba(182,193,211,0.8);">
                            <div class="card-header">
                                <h2 class="card-title"
                                    style="color: #ea4335;text-shadow: 1px 1px 0 #005691; font-size: 28px">Register for
                                    the VMS</h2>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}"
                                          class="steps-validation wizard-circle" id="registerForm">
                                    @csrf

                                    <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-briefcase"></i> Company Information</h6>
                                        <fieldset>
                                            <h5 class="brand-red pb-2">Company Details</h5>
                                            <div class="form-row">

                                                <div class="col form-group">
                                                    <label for="title">{{ __('Title') }} <span
                                                                class="brand-blue">&ast;</span>
                                                    </label>
                                                    <input id="title" type="text"
                                                           class="text-capitalize form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                           name="title" value="{{ old('title') }}" autocomplete="title"
                                                           autofocus
                                                           placeholder="Company/Event/organisation" required>
                                                    @if ($errors->has('title'))
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                                    @endif
                                                </div> <!-- form-group end.// -->

                                                <div class="col form-group">
                                                    <label for="tel">{{ __('Telephone') }} <span
                                                                class="brand-blue">&ast;</span></label>
                                                    <input id="tel" type="tel"
                                                           class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                                           name="tel" value="{{ old('tel') }}" autocomplete="tel"
                                                           placeholder="Company phone number" required>
                                                    @if ($errors->has('tel'))
                                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                                                    @endif
                                                </div> <!-- form-group end.// -->
                                            </div> <!-- form-row end.// -->

                                            <div class="form-group">
                                                <label for="company_email">Email address <span
                                                            class="brand-blue">&ast;</span></label>
                                                <input id="company_email" type="email"
                                                       class="text-lowercase form-control{{ $errors->has('company_email') ? ' is-invalid' : '' }}"
                                                       name="company_email" value="{{ old('company_email') }}"
                                                       autocomplete="company_email" placeholder="Company email address"
                                                       required>

                                                <small class="form-text text-muted pl-3"
                                                       style="text-transform: lowercase!important;color: rgba(0,0,0,0.7)!important;">
                                                    We'll never share
                                                    your email
                                                    with anyone
                                                    else.
                                                </small>

                                                @if ($errors->has('company_email'))
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_email') }}</strong>
                                </span>
                                                @endif
                                            </div> <!-- form-group end.// -->

                                            <div>
                                                <h5 class="brand-red pb-2">Company Type</h5>
                                                <div class="form-row">

                                                    <div class="col form-group">
                                                        <label for="industry">{{ __('Industry') }} <span
                                                                    class="brand-blue">&ast;</span></label>
                                                        <select id="industry" class="form-control" name="industry"
                                                                required>
                                                            <option class="" value="">Select Industry</option>
                                                            @foreach(\App\IndustryType::all() as $type)
                                                                <option value="{{$type->type}}">{{$type->type}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div> <!-- form-group end.// -->

                                                    <div class="col form-group">
                                                        <label for="type">{{ __('Type') }} </label>
                                                        <select id="type" class="form-control" name="type">
                                                            <option value="Public" selected="">Public</option>
                                                            <option value="Self-Employed">Self-Employed</option>
                                                            <option value="Non-Profit">Non-Profit</option>
                                                            <option value="Sole-Proprietorship">Sole Proprietorship
                                                            </option>
                                                            <option value="Private">Private</option>
                                                            <option value="PrivatePartnership">Partnership</option>
                                                        </select>

                                                    </div> <!-- form-group end.// -->
                                                </div> <!-- form-row end.// -->

                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"
                                                             style="border-radius: 0%!important;">
                                                            <span class="input-group-text"
                                                                  id="basic-addon1">http://</span>
                                                        </div>
                                                        <input id="website" type="text"
                                                               class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                                                               name="website" value="{{ old('website') }}"
                                                               autocomplete="website"
                                                               autofocus
                                                               placeholder="Begin with www. or plain text">
                                                        @if ($errors->has('website'))
                                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                                        @endif
                                                    </div>


                                                </div> <!-- form-group end.// -->

                                            </div>

                                            <div>
                                                <h5 class="brand-red pb-2">Physical Address</h5>
                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="city">{{ __('City') }} <span
                                                                    class="brand-blue">&ast;</span></label>
                                                        <input id="city" type="text"
                                                               class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                               name="city" value="{{ old('city') }}" autocomplete="city"
                                                               placeholder="" required>
                                                        @if ($errors->has('city'))
                                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                                        @endif
                                                    </div> <!-- form-group end.// -->

                                                    <div class="form-group col-md-6">
                                                        <label for="country">{{ __('Country') }} <span
                                                                    class="brand-blue">&ast;</span></label>
                                                        <select id="country" class="form-control" name="country"
                                                                required>
                                                            <option> Choose...</option>
                                                            <option value="Kenya" selected="selected">Kenya</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Tanzania">Tanzania</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                        </select>
                                                    </div> <!-- form-group end.// -->
                                                </div> <!-- form-row.// -->

                                                <div class="form-group">
                                                    <label for="postcode">{{ __('Postal Address') }}
                                                    </label>
                                                    <input id="postcode" type="text"
                                                           class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                                                           name="postcode" value="{{ old('postcode') }}"
                                                           autocomplete="postcode"
                                                           placeholder="P.O BOX 123...">
                                                    @if ($errors->has('postcode'))
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                                    @endif

                                                </div> <!-- form-group end.// -->
                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6><i class="step-icon feather icon-dollar"></i> Payment</h6>
                                        <fieldset>
                                            <h5>Subscribe to a service</h5>
                                            <div class="form-group">
                                                <select id="service" class="form-control" name="service_type" required>
                                                    {{--<option>Select service to purchase</option>--}}
                                                    @foreach(\App\Service::all() as $service)
                                                        <option value="{{$service->id}}">{{$service->title."  pricing ".$service->pricing}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="">
                                                <div class="">
                                                    <h5 class="">Select Payment Method</h5>
                                                </div>
                                                <div class="row text-center center">
                                                    <div class="col-4">
                                                        <input type="radio" name="payment" class="pay-check" title="0"
                                                               checked>
                                                        <img src="{{asset("img/home/mastercard.svg")}}"
                                                             class="w-100"
                                                             style="max-width: 36px">

                                                    </div>
                                                    <div class="col-4">
                                                        <input type="radio" name="payment" class="pay-check" title="1">
                                                        <img src="{{asset("img/home/visa.svg")}}"
                                                             class="w-100"
                                                             style="max-width: 36px">

                                                    </div>
                                                    <div class="col-4">

                                                        <input type="radio" name="payment" class="pay-check" title="2">
                                                        <img src="{{asset("img/home/mpesa.svg")}}"
                                                             class="w-100"
                                                             style="max-width: 48px">
                                                    </div>
                                                </div>
                                                <div class="border p-2 mb-2 mt-2">
                                                    <section class="pay-mt pr-3 pl-3">
                                                        <div class="form-row">

                                                            <div class="col form-group">
                                                                <label for="First Name">{{ __('First Name') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span>
                                                                </label>
                                                                <input id="First Name" type="text"
                                                                       class="form-control"
                                                                       name="fNameCredit" value=""
                                                                       autocomplete="First Name"
                                                                       autofocus
                                                                       placeholder="">
                                                            </div> <!-- form-group end.// -->

                                                            <div class="col form-group">
                                                                <label for="Last Name">{{ __('Last Name') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span></label>
                                                                <input id="Last Name" type="text"
                                                                       class="form-control"
                                                                       name="lNameCredit" value=""
                                                                       autocomplete="Last Name"
                                                                       placeholder="">
                                                            </div> <!-- form-group end.// -->
                                                        </div>

                                                        <div class="form-row">

                                                            <div class="col form-group">
                                                                <label for="Credit Card Number">{{ __('Credit Card Number') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span>
                                                                </label>
                                                                <input id="Credit Card Number"
                                                                       type="number"
                                                                       class="form-control"
                                                                       name="Credit Card Number"
                                                                       value=""
                                                                       autocomplete="Credit Card Number"
                                                                       autofocus
                                                                       placeholder="">
                                                            </div> <!-- form-group end.// -->

                                                            <div class="col-md form-group">
                                                                <label for="secCode">{{ __('Security Code') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span></label>
                                                                <input id="secCode"
                                                                       type="number"
                                                                       class="form-control"
                                                                       name="secCode"
                                                                       value=""
                                                                       placeholder=""
                                                                       style="width: 50%">

                                                            </div> <!-- form-group end.// -->
                                                        </div>

                                                        <div class="form-row">

                                                            <div class="col form-group">
                                                                <label for="Expiration Month">{{ __('Expiration Month') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span>
                                                                </label>
                                                                <select class="form-dropdown form-control"
                                                                        name="expMonthCredit"
                                                                        data-component="cc_exp_month">
                                                                    <option></option>
                                                                    <option value="January"> January
                                                                    </option>
                                                                    <option value="February">
                                                                        February
                                                                    </option>
                                                                    <option value="March"> March
                                                                    </option>
                                                                    <option value="April"> April
                                                                    </option>
                                                                    <option value="May"> May
                                                                    </option>
                                                                    <option value="June"> June
                                                                    </option>
                                                                    <option value="July"> July
                                                                    </option>
                                                                    <option value="August"> August
                                                                    </option>
                                                                    <option value="September">
                                                                        September
                                                                    </option>
                                                                    <option value="October"> October
                                                                    </option>
                                                                    <option value="November">
                                                                        November
                                                                    </option>
                                                                    <option value="December">
                                                                        December
                                                                    </option>
                                                                </select>
                                                            </div> <!-- form-group end.// -->

                                                            <div class="col form-group">
                                                                <label for="Expiration Year">{{ __('Expiration Year') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span></label>


                                                                <select class="form-dropdown form-control"
                                                                        name="expYear"

                                                                        data-component="cc_exp_year">
                                                                    <option></option>
                                                                    <option value="2020"> 2020
                                                                    </option>
                                                                    <option value="2021"> 2021
                                                                    </option>
                                                                    <option value="2022"> 2022
                                                                    </option>
                                                                    <option value="2023"> 2023
                                                                    </option>
                                                                    <option value="2024"> 2024
                                                                    </option>
                                                                    <option value="2025"> 2025
                                                                    </option>
                                                                    <option value="2026"> 2026
                                                                    </option>
                                                                    <option value="2027"> 2027
                                                                    </option>
                                                                    <option value="2028"> 2028
                                                                    </option>
                                                                    <option value="2029"> 2029
                                                                    </option>
                                                                </select>
                                                            </div> <!-- form-group end.// -->
                                                        </div>
                                                    </section>
                                                    <section class="pay-mt pr-3 pl-3" style="display: none">


                                                        <div class="form-row">

                                                            <div class="col form-group">
                                                                <label for="Credit Card Number">{{ __('Credit Card Number') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span>
                                                                </label>
                                                                <input id="Credit Card Number"
                                                                       type="number"
                                                                       class="form-control"
                                                                       name="Credit Card Number"
                                                                       value=""
                                                                       autocomplete="Credit Card Number"
                                                                       autofocus
                                                                       placeholder="">
                                                            </div> <!-- form-group end.// -->
                                                        </div>

                                                        <div class="form-row">

                                                            <div class="col form-group">
                                                                <label for="Expiration Month">{{ __('Expiration Month') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span>
                                                                </label>
                                                                <select class="form-dropdown form-control"
                                                                        name="expMonthCredit"
                                                                        data-component="cc_exp_month">
                                                                    <option></option>
                                                                    <option value="January"> January
                                                                    </option>
                                                                    <option value="February">
                                                                        February
                                                                    </option>
                                                                    <option value="March"> March
                                                                    </option>
                                                                    <option value="April"> April
                                                                    </option>
                                                                    <option value="May"> May
                                                                    </option>
                                                                    <option value="June"> June
                                                                    </option>
                                                                    <option value="July"> July
                                                                    </option>
                                                                    <option value="August"> August
                                                                    </option>
                                                                    <option value="September">
                                                                        September
                                                                    </option>
                                                                    <option value="October"> October
                                                                    </option>
                                                                    <option value="November">
                                                                        November
                                                                    </option>
                                                                    <option value="December">
                                                                        December
                                                                    </option>
                                                                </select>
                                                            </div> <!-- form-group end.// -->

                                                            <div class="col form-group">
                                                                <label for="Expiration Year">{{ __('Expiration Year') }}
                                                                    <span
                                                                            class="brand-blue">&ast;</span></label>


                                                                <select class="form-dropdown form-control"
                                                                        name="expYear"

                                                                        data-component="cc_exp_year">
                                                                    <option></option>
                                                                    <option value="2020"> 2020
                                                                    </option>
                                                                    <option value="2021"> 2021
                                                                    </option>
                                                                    <option value="2022"> 2022
                                                                    </option>
                                                                    <option value="2023"> 2023
                                                                    </option>
                                                                    <option value="2024"> 2024
                                                                    </option>
                                                                    <option value="2025"> 2025
                                                                    </option>
                                                                    <option value="2026"> 2026
                                                                    </option>
                                                                    <option value="2027"> 2027
                                                                    </option>
                                                                    <option value="2028"> 2028
                                                                    </option>
                                                                    <option value="2029"> 2029
                                                                    </option>
                                                                </select>
                                                            </div> <!-- form-group end.// -->
                                                        </div>
                                                    </section>
                                                    <section class="pay-mt pr-3 pl-3" style="display: none">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                                                        aspernatur earum enim quo quod repellat sed similique tempore
                                                        unde vel? Ad consectetur corporis distinctio esse facilis illo
                                                        iusto nostrum quae.
                                                    </section>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 3 -->
                                        <h6><i class="step-icon feather icon-user"></i> User Information</h6>
                                        <fieldset>
                                            <div class="form-group brand-red border" style="padding: 8px;">
                                                <p style="text-shadow: 1px 1px 0 #e5e5e5;color: #dd5047">
                                                    Filling this form you verify that I am an authorized representative
                                                    of this organisation
                                                    and
                                                    have
                                                    the
                                                    right to act on its behalf in the creation and management of this
                                                    page. The
                                                    organisation and I agree to the additional terms for Pages.
                                                </p>
                                                {{--    <label class="pt-2">
                                                        <input type="checkbox" class="" required>
                                                        I verify that I am an authorized representative of this organisation
                                                        and
                                                        have
                                                        the
                                                        right to act on its behalf in the creation and management of this
                                                        page. The
                                                        organisation and I agree to the additional terms for Pages.
                                                    </label>
    --}}
                                                <div class="">
                                                    <h5 class="brand-red pb-2 pt-3 text-underline"><u>Please Fill your
                                                            personal
                                                            details</u></h5>
                                                    <div class="form-row">

                                                        <div class="col form-group">
                                                            <label for="name">{{ __('Fullname') }}</label>
                                                            <input type="text" name="name"
                                                                   placeholder="" id="name"
                                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} text-capitalize"
                                                                   value="{{ old('name') }}" autocomplete="name"
                                                                   required>
                                                        </div> <!-- form-group end.// -->
                                                        <div class="col form-group">
                                                            <label for="email">{{ __('Email') }}</label>
                                                            <input id="email" type="email"
                                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} text-lowercase"
                                                                   name="email" value="{{ old('email') }}"
                                                                   autocomplete="email"
                                                                   required>

                                                            @if ($errors->has('email'))
                                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                            @endif
                                                        </div> <!-- form-group end.// -->
                                                    </div> <!-- form-row end.// -->
                                                    <div class="form-group">
                                                        <label for="password">{{ __('Password') }}</label>
                                                        <input id="password" type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               name="password" autocomplete="new-password"
                                                               required>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                        <input id="password-confirm" type="password"
                                                               class="form-control"
                                                               name="password_confirmation" autocomplete="new-password"
                                                               required>

                                                    </div><!-- form-group end.// -->

                                                </div>
                                            </div>
                                        </fieldset>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    {{-- include footer --}}
    @include('panels/landing-footer')
@endsection

@section('page-scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('js/core/app-menu.js') }}"></script>
    <script src="{{ asset('js/core/app.js') }}"></script>
    <script src="{{ asset('js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('js/scripts/forms/wizard-steps2.js') }}"></script>

    <script>
        var payMethods = document.getElementsByClassName("pay-mt");
        $(".pay-check").change(function () {

            for (var i = 0; i < payMethods.length; i++) {
                payMethods[i].style.display = "none";
            }
            payMethods[this.title].style.display = "block";
        });
    </script>


@endsection