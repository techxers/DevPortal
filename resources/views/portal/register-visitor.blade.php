@extends('layouts/contentLayoutMaster')

@section('title', 'Register Visitor')

@section('vendor-style')
    <!-- vednor css files -->
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">

@endsection

@section('mystyle')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/forms/validation/form-validation.css') }}">


@endsection
@section('content')


    <!-- Form wizard with step validation section start -->
    <section id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title cs-heading "><i
                                    class="feather icon-clipboard"></i> Visitor Registration</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="{{route('add-visitor')}}" name="visRegisterForm"
                                  class="steps-validation wizard-circle">
                                @csrf

                                <h6><i class="step-icon fas fa-exclamation"></i> Step 1</h6>
                                <fieldset class="">
                                    <div class="row justify-content-center" style="padding-bottom: 64px;">
                                        <div class="col-md-8 pl-2 pr-2" style="padding-top: 64px;">
                                            <div class="form-group">
                                                <label for="visIdNumber" class="text-center cs-text-shadow-white"
                                                       style="font-size: 20px;">
                                                    Visitor ID Number/Passport <span class="text-red">*</span>
                                                </label>
                                                <div class="controls">
                                                    <input type="text" name="visIdNumber" id="visIdNumber"
                                                           class="form-control"
                                                           data-validation-regex-regex="([^a-z]*[A-Z]*)*"
                                                           data-validation-containsnumber-regex="([^0-9]*[0-9]+)+"
                                                           data-validation-required-message="This field cannot be empty"
                                                           maxlength="15" minlength="5"
                                                           placeholder="Enter a valid ID number" value=""
                                                           required>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </fieldset>
                                <!-- Step 1 -->
                                <h6><i class="step-icon fas fa-question"></i> Step 2</h6>
                                <fieldset style="padding: 64px 4px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visFirName">
                                                    First Name
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="visFirName"
                                                           placeholder="Visitor First Name"
                                                           name="visFirName" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visLasName">
                                                    Last Name
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="visLasName"
                                                           placeholder="Visitor Last Name"
                                                           name="visLasName" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visEmailAddr">
                                                    Email address
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="email" class="form-control text-lowercase"
                                                           id="visEmailAddr"
                                                           placeholder="Email of Visitor"
                                                           name="visEmailAddr" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visPhoneNo">
                                                    Mobile Number
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control" placeholder="Mobile number"
                                                           required name="visPhoneNo" id="visPhoneNo">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-smartphone"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visHost">
                                                    Person/Host
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="visHost"
                                                           placeholder="Person to visit"
                                                           name="visHost" required list="visHostLists">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-users"></i>
                                                    </div>
                                                    <datalist id="visHostLists">
                                                        @foreach(\App\Visitor::select('host')->distinct()->get() as $visHostList)
                                                            <option value="{{$visHostList['host']}}">
                                                        @endforeach
                                                    </datalist>
                                                </fieldset>
                                                <label for="visOffice">
                                                    Department/Office
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <select type="text" class="form-control"
                                                            name="visOffice" id="visOffice" required>

                                                        <option value=""> Select Office/Department to visit</option>
                                                        @foreach(explode(",",rtrim($organisation->organisation_config->departments,",")) as $depts)
                                                            @if($depts=="")
                                                                @continue;
                                                            @endif
                                                            <option value="{{$depts}}">{{$depts}}</option>

                                                        @endforeach
                                                    </select>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-briefcase"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="assetAdd">
                                                    Asset Management
                                                </label>
                                                <div class="input-group">

                                                    <select class="form-control text-muted"
                                                            id="assetAdd" name="assetAdd"
                                                            aria-describedby="button-addon2">
                                                        <option selected value="">No asset selected</option>
                                                       @foreach(explode(",",rtrim($organisation->organisation_config->assets,",")) as $assets)
                                                            @if($assets=="")
                                                                @continue;
                                                            @endif
                                                            <option value="{{$assets}}">{{$assets}}</option>

                                                        @endforeach

                                                    </select>
                                                    <div class="input-group-append" id="button-addon2">
                                                        <button class="btn btn-transparent border waves-effect waves-light hover"
                                                                type="button" id="assetAddBtn"><i
                                                                    class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-group w-50 mt--4 col-12 col-sm-6 col-md-6">
                                                        <div class="input-group-prepend ">
                                                            <span class="input-group-text bg-transparent"
                                                                  style="border-top: 0!important;font-size: 10px!important;"
                                                                  id="serial-label">Serial No.</span>
                                                        </div>
                                                        <input type="number" class="form-control "
                                                               placeholder="Asset serial no."
                                                               id="assetSerial" name="assetSerial"
                                                               aria-describedby="serial-label" value="Serial Number"
                                                               style="border-top: 0!important;">

                                                    </div>
                                                    <div class="input-group w-50 mt--4 col-12 col-sm-6 col-md-6"
                                                         style="padding-top: 4px">
                                                        <span class="small text-muted">Assets can be entered one by one or multiple separated by comma</span>

                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visState" id="check1" value="1">
                                                            <label class="custom-control-label"
                                                                   for="check1">Expected </label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="" style="padding:16px 0">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visState" id="check2" value="2" checked>
                                                            <label class="custom-control-label" for="check2">Checked
                                                                in</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                {{--
                                                 <li class="">
                                                     <fieldset>
                                                         <div class="custom-control custom-radio">
                                                             <input type="radio" class="custom-control-input"
                                                                    name="visState" id="check3" value="3">
                                                             <label class="custom-control-label" for="check3">Checked
                                                                 out</label>
                                                         </div>
                                                     </fieldset>
                                                 </li>
                                                --}}

                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="visComment">Comments</label>
                                                    <textarea name="visComment" id="visComment" rows="4"
                                                              class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group text-center">
                                                <br>

                                                <table class="table" id="assetsTable">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="3" class="text-capitalize"
                                                            style="font-size: 14px;font-weight: 300">Assets for the
                                                            visitor
                                                        </th>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Asset</th>
                                                        <th>Serial No.</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="small">
                                                        <td></td>
                                                        <td>No asset</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <input value="" type="text" name="assetsHolder" id="assetsHolder"
                                                       class="cs-hidden">
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>

                                <!-- Step 3 -->
                                <h6><i class="step-icon feather icon-user-check"></i> Step 3</h6>
                                <fieldset style="padding: 64px 4px;" class="text-center">

                                    <div class="pt-2 pb-3 text-center justify-content-center" >
                                        <div class="form-group text-center">
                                            <br>

                                            <table class="table" id="assetsTable">
                                                <thead>
                                                <tr>
                                                    <th colspan="3" class="text-capitalize"
                                                        style="font-size: 14px;font-weight: 300">Summary of Assets for the
                                                        visitor
                                                    </th>
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Asset</th>
                                                    <th>Serial No.</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="small">
                                                    <td></td>
                                                    <td>No asset</td>
                                                </tr>
                                                </tbody>
                                            </table>
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
    <!-- Form wizard with step validation section end -->
@endsection

@section('vendor-script')
    <!-- vednor files -->
    <script src="{{ asset('vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>

    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection
@section('myscript')
    <!-- Page js files -->
    <script src="{{ asset('js/scripts/forms/wizard-steps.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>

    <script src="{{ asset('js/scripts/forms/validation/form-validation.js') }}"></script>

    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>

    <script>
        var visForm = document.forms["visRegisterForm"];
        var pageLoad = true;

        $('.timeInputs').css('display', 'none');

        document.querySelector('#visIdNumber').addEventListener('keyup', function (e) {

            visitorDefaults();
        });


        function visitorDefaults() {


            $.get("visitor/" + visForm["visIdNumber"].value, function (data, status) {
                var x, y, host, office, dateOfVisit, appointDate, appointTime, appointsTableOut = "";

                if (data) {
                    var visitorMultiArray = data[0];
                    visForm["visFirName"].value = visitorMultiArray[0].first_name;
                    visForm["visLasName"].value = visitorMultiArray[0].last_name;
                    visForm["visEmailAddr"].value = visitorMultiArray[0].email;
                    visForm["visPhoneNo"].value = visitorMultiArray[0].phone;
                }
            });

        }

        function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        var assetArray,countAssets=1;

        $("#assetAddBtn").click(function () {
            var assetName = visForm["assetAdd"].value;
            var assetSerial = visForm["assetSerial"].value;
            if (assetName === "")
                return;
            else if (assetSerial === "") {
                assetSerial = "none";
            }

            if (pageLoad) {
                $('#assetsTable > tbody:last-child').html('')
                pageLoad = false;
            }


            $('#assetsTable > tbody:last-child').append('' +
                '<tr class="small">\n' +
                '<td>' + countAssets++ + '</td>\n' +
                '<td>' + assetName + '</td>\n' +
                '<td>' + assetSerial + '</td>\n' +
                '</tr>');

            visForm["assetsHolder"].value += assetName + "=" + assetSerial + ",";
            visForm["assetAdd"].value = "";


        });

    </script>
@endsection
