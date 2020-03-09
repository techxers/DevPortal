@extends('layouts/contentLayoutMaster')

@section('title', 'Manage Billings')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/app-user.css') }}">

@endsection

@section('content')
    <!-- users edit start -->
    <section class="users-edit">
        <div class="card">

            <div class="card-content">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                               href="#account"
                               aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-plus-square mr-25"></i><span class="d-none d-sm-block">Add</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                               href="#information"
                               aria-controls="information" role="tab" aria-selected="false">
                                <i class="feather icon-delete mr-25"></i><span
                                        class="d-none d-sm-block">Modify</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <!-- users edit media object start -->
                            <div class="media mb-2">
                                <a class="mr-2 my-25" href="#">
                                    <img src="{{ asset('custom/custom2/upload/icon-about-9.png') }}" alt="users avatar"
                                         class="users-avatar-shadow rounded" height="36" width="36">
                                </a>

                            </div>
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <form action="{{route('billing-add')}}" method="post">
                                @csrf;
                                <h5>Add new product</h5>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Title</label>
                                                <input type="text" class="form-control" placeholder="Product Title"
                                                       value="" required name="title"
                                                       data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Description</label>
                                                <input type="text" class="form-control" placeholder="About the product"
                                                       required name="description"
                                                       data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Functionality</label>
                                                <textarea type="text" class="form-control" placeholder="Functionality"
                                                          name="functionality" rows="3"
                                                          required
                                                          data-validation-required-message="This field is required">

                                                </textarea>
                                                <span class="small text-muted">When multiple separate them by a semicolon ;</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                        <br>
                                        <div>
                                            <img src="{{ asset('custom/custom2/upload/icon-about-11.png') }}"
                                                 alt="users avatar"
                                                 class="users-avatar-shadow rounded" height="24" width="24">
                                        </div>
                                        <br>
                                        <div class="d-flex w-100 justify-content-between">

                                            <h5>Add new product plans</h5>
                                            <a href="javascript:addPlan();"> <i class="fa fa-plus-circle fa-2x"></i></a>
                                        </div>
                                        <br>
                                    </div>

                                    <div id="b-data" class="col-12 row">
                                        <div class="row col-12 plan-product">
                                            <div class="col-12"><h3 class="badge-primary badge">1</h3></div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" placeholder="Plan Title"
                                                               value="" required name="plan_title1"
                                                               data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Pricing</label>
                                                        <input type="number" class="form-control"
                                                               placeholder="Plan Pricing"
                                                               value="" required name="plan_price1"
                                                               data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Period</label>
                                                    <select class="form-control" required name="plan_period1">
                                                        <option value="monthly">Monthly</option>
                                                        <option value="quarterly">Quarterly</option>
                                                        <option value="yearly">Yearly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>NB: Note</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="//not necessary"
                                                               value="" name="plan_note1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Functionality</label>
                                                        <textarea type="text" class="form-control"
                                                                  placeholder="Functionality"
                                                                  name="plan_functionality1" rows="4"
                                                                  required
                                                                  data-validation-required-message="This field is required">

                                                </textarea>
                                                        <span class="small text-muted">When multiple separate them by a semicolon ;</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 row">
                                            <div class="row col-12">
                                                <div class="col-12"><h3 class="badge-primary badge">
                                                        Assign Features/Functionality
                                                    </h3></div>
                                                <div class="col-6 col-sm-4 col-md-3">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>No. User Accounts</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="No. of User Accounts"
                                                                   value="5" required name="func_no_accounts1" min="1" max="1000"
                                                                   data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-4 col-md-3">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>No. of SMS</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="No. of SMS"
                                                                   value="500" required name="func_no_sms1" min="1"
                                                                   max="10000"
                                                                   data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-4 col-md-3">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>No. of Records</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="No. of customer records"
                                                                   value="500000" required name="func_no_records1" min="1"
                                                                   max="10000000"
                                                                   data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-4 col-md-3">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Receptions/Security Desk</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="Receptions/Security Desk Count"
                                                                   value="1" required name="func_no_modules1" min="1"
                                                                   max="1000"
                                                                   data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <input class="cs-hidden" type="number" name="plan_count" value="1"
                                               id="plan_count">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                            Save
                                            Changes
                                        </button>
                                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                        </div>
                        <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                            <!-- users edit Info form start -->
                            <form novalidate>
                                <div class="row mt-1">
                                    <div class="col-12">
                                        @foreach(\App\Product::all() as $product)
                                            <div class="container">
                                                <div class="">
                                                    <div class="d-flex justify-content-between">
                                                        <h4 class=""
                                                            style="font-size: 24px">{{$product->title}}</h4>
                                                        <a href="{{route('billing-delete')}}?id={{$product->id}}"><span
                                                                    class="pr-2">Delete</span>
                                                            <i class="fa fa-remove fa-2x"></i></a>
                                                    </div>
                                                    <p class="small">{{$product->description}}</p>
                                                    <div class="container">
                                                        <ul class="list-group">
                                                            @foreach(explode(';',$product->functionality) as $func)
                                                                @if(strlen($func)<1)
                                                                    @continue;
                                                                @endif
                                                                <li class="list-group-item">{{$func}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>

                                                    <div class="row pl-2 pr-2">
                                                        @foreach($product->plans as $plan)
                                                            <div class="col-md-4">
                                                                <br>
                                                                <div class="gdlr-ux column-service-ux">
                                                                    <div class="gdlr-item gdlr-column-service-item gdlr-type-1"
                                                                         style="margin-bottom: 30px;">
                                                                        <div class="column-service-content-wrapper">
                                                                            <h5 class="column-service-title">{{$plan->title}}</h5>
                                                                            <div class="small">
                                                            <span><b>PRICE : {{$plan->pricing}} KES/<span
                                                                            style="text-transform: capitalize">{{$plan->period}}</span></b></span><br><br>
                                                                            </div>
                                                                            <div class="">
                                                                                <ul class="list-unstyled ul-check success mb-5"
                                                                                    style="list-style-type: square;">
                                                                                    @foreach(explode(';',$plan->functionality) as $func)
                                                                                        @if(strlen($func)<1)
                                                                                            @continue;
                                                                                        @endif
                                                                                        <li>{{$func}}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                            @if(strlen($plan->note)>1)
                                                                                <div>
                                                                                    <i><b>NB: </b>{{$plan->note}}</i>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                            <!-- users edit Info form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- users edit ends -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/pickadate/picker.date.js') }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}

    <script src="{{ asset('js/scripts/pages/app-user.js') }}"></script>
    <script src="{{ asset('js/scripts/navs/navs.js') }}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>

    <script>
        var count = 1, outPlan;

        function addPlan() {
            count++;
            outPlan =
                ' <div class="row col-12 plan-product"><div class="col-12"><br><hr><h3 class="badge-primary badge">' + count + '</h3></div>\n' +
                '                                        <div class="col-12 col-sm-6">\n' +
                '                                            <div class="form-group">\n' +
                '                                                <div class="controls">\n' +
                '                                                    <label>Title</label>\n' +
                '                                                    <input type="text" class="form-control" placeholder="Plan Title"\n' +
                '                                                           value="" required name="plan_title' + count + '"\n' +
                '                                                           data-validation-required-message="This field is required">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <div class="controls">\n' +
                '                                                    <label>Pricing</label>\n' +
                '                                                    <input type="number" class="form-control" placeholder="Plan Pricing"\n' +
                '                                                           value="" required name="plan_price' + count + '"\n' +
                '                                                           data-validation-required-message="This field is required">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <label>Period</label>\n' +
                '                                                <select class="form-control" required name="plan_period' + count + '">\n' +
                '                                                    <option value="monthly">Monthly</option>\n' +
                '                                                    <option value="quarterly">Quarterly</option>\n' +
                '                                                    <option value="yearly">Yearly</option>\n' +
                '                                                </select>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div class="col-12 col-sm-6">\n' +
                '                                            <div class="form-group">\n' +
                '                                                <div class="controls">\n' +
                '                                                    <label>NB: Note</label>\n' +
                '                                                    <input type="text" class="form-control" placeholder="//not necessary"\n' +
                '                                                           value=""  name="plan_note' + count + '">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="form-group">\n' +
                '                                                <div class="controls">\n' +
                '                                                    <label>Functionality</label>\n' +
                '                                                    <textarea type="text" class="form-control" placeholder="Functionality"\n' +
                '                                                              name="plan_functionality' + count + '" rows="4"\n' +
                '                                                              required\n' +
                '                                                              data-validation-required-message="This field is required">\n' +
                '\n' +
                '                                                </textarea>\n' +
                '                                                    <span class="small text-muted">When multiple separate them by a semicolon ;</span>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';



            outPlan+='<div class="col-12 row">\n' +
                '                                        <div class="row col-12 plan-product">\n' +
                '                                            <div class="col-12"><h3 class="badge-primary badge">\n' +
                '                                                    Assign Features/Functionality\n' +
                '                                                </h3></div>\n' +
                '                                            <div class="col-6 col-sm-4 col-md-3">\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <div class="controls">\n' +
                '                                                        <label>No. User Accounts</label>\n' +
                '                                                        <input type="number" class="form-control"\n' +
                '                                                               placeholder="No. of User Accounts"\n' +
                '                                                               value="5" required name="func_no_accounts' + count + '" min="1" max="1000"\n' +
                '                                                               data-validation-required-message="This field is required">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="col-6 col-sm-4 col-md-3">\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <div class="controls">\n' +
                '                                                        <label>No. of SMS</label>\n' +
                '                                                        <input type="number" class="form-control"\n' +
                '                                                               placeholder="No. of SMS"\n' +
                '                                                               value="500" required name="func_no_sms' + count + '" min="1"\n' +
                '                                                               max="10000"\n' +
                '                                                               data-validation-required-message="This field is required">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="col-6 col-sm-4 col-md-3">\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <div class="controls">\n' +
                '                                                        <label>No. of Records</label>\n' +
                '                                                        <input type="number" class="form-control"\n' +
                '                                                               placeholder="No. of customer records"\n' +
                '                                                               value="500000" required name="func_no_records' + count + '" min="1"\n' +
                '                                                               max="10000000"\n' +
                '                                                               data-validation-required-message="This field is required">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="col-6 col-sm-4 col-md-3">\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <div class="controls">\n' +
                '                                                        <label>Receptions/Security Desk</label>\n' +
                '                                                        <input type="number" class="form-control"\n' +
                '                                                               placeholder="Receptions/Security Desk Count"\n' +
                '                                                               value="1" required name="func_no_modules' + count + '" min="1"\n' +
                '                                                               max="1000"\n' +
                '                                                               data-validation-required-message="This field is required">\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';

            document.getElementById("plan_count").value = count;
            $('#b-data').append(outPlan);
        }

        //
    </script>
@endsection

