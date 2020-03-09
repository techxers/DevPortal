@extends('layouts/contentLayoutMaster')

@section('title', 'Reactivate Account')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/charts/apexcharts.css')}}">
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>
    <link href="{{asset('custom/nt-styles.css')}}" rel="stylesheet"/>
@endsection
@section('mystyle')

    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pages/card-analytics.css')}}">
    <style>
        .dashboard-bg {
            position: absolute;
            left: 0;
            right: 0;
            min-height: 500px;
            background-image: url({{asset('img/theme/summary2bg.png')}});
            background-size: contain;
            background-position: center top;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">


@endsection
@section('content')
<section>

    <div class="pt-2 pb-2">
        <h1 class="text-red">Your account has been disabled</h1>
        <div class="d-flex justify-content-between w-25 pt-2 pb-2 ">
            <h4 class="text-muted">Reason</h4>
            <p>{{$organisation->disable_reason}}</p>
        </div>
    </div>
    @php
        $service=\App\Subscription::where('organisation_id', $organisation->id)->get()[0];
    $countS=0;
    @endphp
</section>
    <section>
        <form method="POST" action=""
              class="" id="registerForm" name="registerForm">


            <fieldset>

                <legend class="brand-blue pb-2">
                    <h5 style="font-size: 24px" class="text-blue">Renew Your Subs</h5></legend>

                <div class="form-group">
                    <div class="cs-hidden">
                        <input type="number" value="{{\App\Product::all()->count()}}" name="productCount">
                    </div>
                    @php
                        $pkgIndex=-1;
                    @endphp
                    @php
                        $indexTrack1=-1;
                    @endphp
                    <div class="row pt-3 ">
                        <div class="col-md-5">
                            <div class="pl-1">
                                <h5 class="">Select Products</h5>
                                <table class="table table-responsive table-borderless">
                                    <tbody class="pkgs">
                                    @foreach(\App\Product::all() as $product)
                                        @php
                                            $indexTrack1++;
                                        @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="productSelect"
                                                       name="product{{$indexTrack1}}" id="{{$product->id}}"
                                                       value="{{$product->id}}">
                                            </td>
                                            <td class="pl-2">{{$product->title}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-7 p-0">
                            @php
                                $indexTrack1=-1;
                            @endphp

                            @foreach(\App\Product::all() as $product)
                                @php
                                    $indexTrack1++;
                                @endphp
                                <div class="productPlans">
                                    <h6 class="text-md-center"><u>{{$product->title}} Plans</u></h6>
                                    <table class="table w-100 table-borderless">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <th>Plan</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->plans as $plan)
                                            <tr>
                                                <td>
                                                    <input type="radio" name="plan_product{{$indexTrack1}}"
                                                           value="{{$plan->id."=".$plan->pricing}}"
                                                           @if(($plan->title)==='Basic')  checked
                                                           @endif class="plan_select">
                                                </td>
                                                <td class="">{{$plan->title}}</td>
                                                <td class="text-capitalize">{{$plan->pricing." / ".$plan->period}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            @endforeach
                            <div class="cs-hidden">
                                <input type="text" name="regProducts" id="regProducts"  required>
                                <input type="text" name="regPlans" id="regPlans"  required>
                                <input type="number" name="regTotalPayee" id="regTotalPayee" value="0">
                            </div>

                            <div class="">
                                <h6 class="text-md-center"><u>Total Payment</u></h6>
                                <table class="table table-borderless">

                                    <tbody>
                                    <tr>
                                        <td class="text-right">Kshs.</td>
                                        <td class=""><b id="totalPayment">00.00</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div>

                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
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
        </form>
    </section>
@endsection

@section('vendor-script')
    {{-- vednor files --}}
    <script src="{{ asset('vendors/js/charts/apexcharts.min.js')}}"></script>

    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>

@endsection
