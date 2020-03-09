@extends('layouts/contentLayoutMaster')

@section('title', 'Admin Dashboard')

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
    <section id="dashboard-analytics">
        <div class="dashboard-bg"
             style=""></div>
        <div style="padding-top:128px"></div>
        <div class="row header-cards mb-3">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Walk ins</h5>
                                <span class="h2 font-weight-bold mb-0">{{\App\Visitor::where([['organisation_id','=',$organisation->id],['visitor_state','=', 2]])->get()->count()}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <img src="{{asset("img/walk_in.svg")}}" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1004) ])}}">
                            <button type="button" class="btn btn-danger mr-1 mb-1 mt-2">View more</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Walk outs</h5>
                                <span class="h2 font-weight-bold mb-0">{{\App\Visitor::where([['organisation_id','=',$organisation->id],['visitor_state','=', 3]])->get()->count()}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <img src="{{asset("img/walk_out.svg")}}" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1005) ])}}">
                            <button type="button" class="btn btn-warning mr-1 mb-1 mt-2">View Details</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Expected</h5>
                                <span class="h2 font-weight-bold mb-0">{{\App\Visitor::where([['organisation_id','=',$organisation->id],['visitor_state','=', 1]])->get()->count()}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <img src="{{asset("img/expected.svg")}}" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1006) ])}}">
                            <button type="button" class="btn bg-yellow mr-1 mb-1 mt-2 text-white">View more</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Active Staffs</h5>
                                <span class="h2 font-weight-bold mb-0">{{$organisation->users->where("status",true)->count()."/".$organisation->users->count()}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <img src="{{asset("img/active.svg")}}" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="{{route("view-staff")}}">
                            <button type="button" class="btn btn-info mr-1 mb-1 mt-2">View more</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @php
            $subs_get=\App\Subscription::where('organisation_id', $organisation->id)->get();
        @endphp
        <div class="row header-cards mb-3">
            <div class="col-xl-3 col-lg-6">
                <a href="javascript:void(0)" class="card-link sideFunc">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">VSM Payment Status</h5>
                                    <span style="font-size: 12px">&laquo;
                                        @php
                                            $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                            $datetime2 =new DateTime($subs_get[0]->subscribed_on);
                                            date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                            $interval = $datetime2->diff($datetime1);
                                            echo abs($interval->format('%R%a days'));
                                        @endphp
                                        days remaining &raquo;</span>
                                </div>
                                <div class="text-center"><i class="fas fa-dollar fa-3x "></i></div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header justify-content-center">
                        <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">Visitor Retention </h3>
                        <a class="heading-elements-toggle"><i
                                    class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i
                                                class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action="expand"><i
                                                class="feather icon-maximize"></i></a></li>
                                <li><a data-action="reload"><i
                                                class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="client-retention-chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12">
                <div class="container" style="background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);">
                    <div class="justify-content-center pt-2 pb-2">
                        <h3 class=" text-center cs-text-shadow-white text-blue" style="font-size: 24px">
                            Subscriptions Details</h3>
                    </div>

                    <div class="row justify-content-center">
                        @foreach($subs_get as $subs)
                            @if(!($subs->is_active))
                                @continue
                            @endif
                            @foreach(explode("%",trim($subs->plans)) as $subs_plans_id)
                                @if(!is_numeric($subs_plans_id))
                                    @continue
                                @endif
                                @php
                                    $plans=\App\Plan::find($subs_plans_id);
                                @endphp
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">{{$plans->product->title." (".$plans->title.")"}} </h4>
                                            <a class="heading-elements-toggle"><i
                                                        class="fa fa-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i
                                                                    class="feather icon-chevron-down"></i></a></li>
                                                    <li><a data-action="expand"><i
                                                                    class="feather icon-maximize"></i></a></li>
                                                    <li><a data-action="reload"><i
                                                                    class="feather icon-rotate-cw"></i></a></li>
                                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="text-capitalize text-muted">
                                                                Price: {{$plans->pricing}}
                                                                /{{$plans->period}}</h6>
                                                            <h6>Paid: {{$subs->amount_paid}}</h6>
                                                        </div>
                                                        <div class="mt-1">
                                                            <h6>Date Subscribed: <span
                                                                        class="text-muted">{{date_format(date_create($subs->subscribed_on),'l jS F Y')}}</span>
                                                            </h6>
                                                        </div>
                                                        <div class="mt-1">
                                                            <h6>Time Left: <span class="text-muted"
                                                                                 style="font-size: 20px">
                                                        @php
                                                            $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                                            $datetime2 =new DateTime($subs->subscribed_on);
                                                            date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                                            $interval = $datetime2->diff($datetime1);
                                                            echo abs($interval->format('%R%a days'));
                                                        @endphp

                                                    </span> days</h6>
                                                        </div>
                                                        <div class="table-responsive mt-1">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr class="text-center">
                                                                    <th style="font-size: 16px; text-transform: capitalize!important;font-weight: 200">
                                                                        Features Available
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach(explode(';',$plans->functionality) as $func)
                                                                    @if(strlen($func)<1)
                                                                        @continue;
                                                                    @endif
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            {{$func}} <i class="feather icon-check"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
<br><br><br>
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

    <script>
        /***********************dealing with product selection**********************/
        var productsPlans = document.getElementsByClassName('productPlans');
        var products = document.getElementsByClassName('productSelect');
        var formReference = document.forms["registerForm"];
        var total = 0;
        for (var x = 0; x < productsPlans.length; x++) {
            productsPlans[x].style.display = "none";
        }
        $(".productSelect").change(function () {
            for (var x = 0; x < products.length; x++) {
                if (products[x].checked) {
                    productsPlans[x].style.display = "block";

                } else {
                    productsPlans[x].style.display = "none";
                }
            }
            calculateTotal();
        });
        $(".plan_select").change(function () {
            calculateTotal();
        });

        function calculateTotal() {
            total = 0;
            for (var x = 0; x < products.length; x++) {
                if (products[x].checked)
                    total += parseInt(formReference['plan_product' + x].value.split("=")[1]);
            }
            document.getElementById("totalPayment").innerHTML = total;
            formReference['regTotalPayee'].value=total;
            collectProducts();
        }

        function collectProducts() {
            var outProducts="", outPlans="";
            for (var x = 0; x < products.length; x++) {
                if (products[x].checked) {
                    outProducts += products[x].value + "%";
                    outPlans += formReference['plan_product' + x].value.split("=")[0]+"%";
                }
            }
            formReference['regProducts'].value=outProducts;
            formReference['regPlans'].value=outPlans;
        }
    </script>

@endsection
