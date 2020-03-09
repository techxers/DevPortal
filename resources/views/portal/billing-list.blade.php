@extends('layouts/contentLayoutMaster')

@section('title', 'Billing List')

@section('vendor-style')
    {{-- vednor files --}}
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">

@endsection

@section('content')
    {{-- Data list view starts --}}
    <section id="data-list-view" class="data-list-view-header">
        {{--
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light pr-3"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="m">Lock Down All</a>
                        <a class="dropdown-item" href="javascript:void(0)">Enable All</a>
                    </div>
                </div>
            </div>
        </div>
        --}}
        <div class="action-btns d-nonex">Enable or Disable Service</div>

        {{-- DataTable starts --}}
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                <tr>
                    <th class="text-uppercase">Disable/Enable</th>
                    <th>Organisation</th>
                    <th class="text-uppercase">Subscription</th>
                    <th class="text-uppercase">Date Subscribed</th>
                    <th class="text-uppercase">Period</th>
                    <th class="text-uppercase">Amount Paid</th>
                    <th class="text-uppercase">Time Left</th>
                    <th class="text-uppercase">Status</th>
                </tr>
                </thead>
                <tbody>
                <div style="display: none">{{$count=1}}
                </div>


                @foreach(\App\Subscription::all() as $subs)
                    @if($subs->organisation->id==1)
                        @continue
                    @endif

                    <tr>
                        <td>
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <input type="checkbox" value="{{$subs->organisation->id}}"
                                       class="custom-control-input orgManageCheck"
                                       id="customSwitch{{$count+15}}" name="{{$subs->organisation->name}}"
                                       @if($subs->organisation->access_status>0) checked @endif>
                                <label class="custom-control-label" for="customSwitch{{$count+15}}">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                </label>
                            </div>
                        </td>

                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                    <img alt="Image placeholder"
                                         src="{{asset(config('app.file_path').($subs->organisation->image??'organisation/logo/org_default.svg'))}}">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$subs->organisation->name}}</span>
                                </div>
                            </div>
                        </th>
                        <td>
                            @foreach(explode("%",trim($subs->plans)) as $subs_title)
                                @if(!is_numeric($subs_title))
                                    @continue
                                @endif
                                <div class="cs-hidden">
                                    {{$plan=\App\Plan::find($subs_title)}}
                                </div>

                                {{$plan->product->title." (".($plan->title).")"}}
                            @endforeach


                        </td>
                        <td>
                            {{date_format(date_create($subs->subscribed_on), 'd/m/Y')." at ".date_format(date_create($subs->time_in), 'g:i A')}}
                        </td>
                        <td>
                            @foreach(explode("%",trim($subs->plans)) as $subs_title)
                                @if(!is_numeric($subs_title))
                                    @continue
                                @endif

                                {{$plan=\App\Plan::find($subs_title)->period}}
                            @endforeach
                        </td>
                        <td>
                            {{$subs->amount_paid}}

                        </td>

                        <td>
                            <span style="font-size: 24px">

                                    @php

                                        $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                        $datetime2 =new DateTime($subs->subscribed_on);
                                        date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                        $interval = $datetime2->diff($datetime1);
                                        echo abs($interval->format('%R%a days'));

                                    @endphp
                                </span> days
                        </td>

                        <td>
                            @if($subs->organisation->access_status>0)
                                <div class="chip chip-primary mr-1">
                                    <div class="chip-body">
                                        <span class="chip-text">In Operation</span>
                                    </div>
                                </div>
                            @else
                                <div class="chip chip-danger mr-1">
                                    <div class="chip-body">

                                        <span class="chip-text">Disabled</span>

                                    </div>
                                </div>

                            @endif
                        </td>
                    </tr>
                    <div class="cs-hidden">{{$count++}}</div>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- DataTable ends --}}
    </section>
    {{-- Data list view end --}}
@endsection
@section('vendor-script')
    {{-- vednor js files --}}
    <script src="{{ asset('vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    {{--

    <script src="{{ asset('vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    --}}
@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{ asset('js/scripts/popover/popover.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>


    <script>


        $('.orgManageCheck').change(function () {
            var switchState = this;
            var org = this.name;
            var reason="";
            var id=this.value;

            if (switchState.checked) {
                $.get("organisations/manage-status" + "?status=" + switchState.checked+ "&id=" + id, function (data, status) {

                    if (data) {
                        Swal.fire({
                            title: "Running",
                            text: "VSM for " + org + " is running",
                            type: "info",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'Reason for shutdown',
                    input: "textarea",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonClass: "btn btn-danger ml-1",
                }).then(function (result) {
                    if (result.value) {
                        $.get("organisations/manage-status" + "?status=" + switchState.checked + "&reason=" + result.value + "&id=" + id, function (data, status) {
                            if (data) {
                                 Swal.fire({
                                  title: "Shutdown",
                                  text: " VSM for " + org + " has been shutdown",
                                  type: "error",
                                  confirmButtonClass: 'btn btn-danger',
                                  buttonsStyling: false,
                              });

                            }

                        })
                    }
                    else {
                        switchState.checked=true;
                    }

                });
            }
        });
    </script>
@endsection
