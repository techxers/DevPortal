@extends('layouts/contentLayoutMaster')

@section('title', 'Billing Reports')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">

@endsection

@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/scripts/pickers/dateTime/daterangepicker.css')}}">

@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <p>
                All Reports for all the organisations using the system
            </p>
        </div>
    </div>


    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Billing reports for {{\App\Organisation::all()->count()-1}}
                            Organisations</h3>

                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete billing record for all organisations
                            </p>
                            <div class="row pt-1 pb-1">
                                <div class="col-md-6">
                                    <form action="" method="get" id="filtersForm" class="forms">
                                        <div class="input-group">
                                            <input type="text" name="from-to" class="form-control mr-2"
                                                   id="date_filter">
                                            <div class="cs-hidden">
                                                <input type="text" name="report_id" class="form-control mr-2"
                                                       value="{{\Illuminate\Support\Facades\Crypt::encrypt(1001)}}">
                                            </div>
                                            <span class="input-group-btn">
                                                <input type="submit" class="btn btn-primary" value="Filter">
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data list view starts --}}
                    <section id="data-list-view" class="data-list-view-header">

                        <div class="action-btns d-none">
                            <div class="btn-dropdown mr-1 mb-1">
                                <div class="btn-group dropdown actions-dropodown">
                                    <button type="button"
                                            class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item action-mail" href="javascript:void(0)">
                                            <i class="feather icon-mail"></i>Send Emails</a>
                                        <a class="dropdown-item action-sms" href="javascript:void(0)">
                                            <i class="feather icon-message-square"></i>Send Messages</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DataTable starts --}}
                        <div class="table-responsive">
                            <table class="table data-list-view dataex-html5-selectors">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Contact Address</th>
                                    <th>Product</th>
                                    <th>Plan</th>
                                    <th>Date Subscribed</th>
                                    <th>Amount Paid</th>
                                    <th>Period</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $count=1;
                                @endphp
                                @foreach($subscriptions as $subscription)
                                    @if($subscription->organisation->id==1)
                                        @continue;
                                    @endif
                                    <tr>
                                        <td class="small" title="{{$subscription->organisation_id}}"></td>
                                        <td class="small">{{$count++}}</td>
                                        <td class="small">{{$subscription->organisation->name}}</td>
                                        <td class="small">
                                            {{$subscription->organisation->phone}}
                                            {{$subscription->organisation->email}}
                                        </td>
                                        <td class="small">
                                            @foreach(explode("%",trim($subscription->products)) as $subscription_id)
                                                @if(!is_numeric($subscription_id))
                                                    @continue
                                                @endif
                                                {{\App\Product::find($subscription_id)->title}} |

                                            @endforeach
                                        </td>
                                        <td class="small">
                                            @foreach(explode("%",trim($subscription->plans)) as $subscription_id)
                                                @if(!is_numeric($subscription_id))
                                                    @continue
                                                @endif
                                                {{\App\Plan::find($subscription_id)->title}} |

                                            @endforeach
                                        </td>
                                        <td class="small">{{date_format(date_create($subscription->subscribed_on), 'd-M-Y H:i:a')}}</td>
                                        <td class="small">Kshs. {{$subscription->amount_paid}}</td>
                                        <td class="small text-capitalize">
                                            @foreach(explode("%",trim($subscription->plans)) as $subscription_id)
                                                @if(!is_numeric($subscription_id))
                                                    @continue
                                                @endif
                                                {{\App\Plan::find($subscription_id)->period}}

                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- DataTable ends --}}
                    </section>
                    {{-- Data list view end --}}
                </div>
            </div>
        </div>
    </section>
    <!--/ Scroll - horizontal and vertical table -->

@endsection
@section('vendor-script')
    {{-- vednor files --}}
    <script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/ui/data-list-view-reports.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>
    <script src="{{ asset('js/scripts/popover/popover.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/scripts/pickers/dateTime/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('custom/messaging.js')}}"></script>
    <script>

        $(function () {
            let searchParams = new URLSearchParams(window.location.search)
            let dateInterval = searchParams.get('from-to');
            let start = moment().subtract(29, 'days');
            let end = moment().add(29, 'days');

            if (dateInterval) {
                dateInterval = dateInterval.split(' - ');
                start = dateInterval[0];
                end = dateInterval[1];
            }

            $('#date_filter').daterangepicker({
                "showDropdowns": true,
                "showWeekNumbers": true,
                "alwaysShowCalendars": true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'YYYY-MM-DD',
                    firstDay: 1,
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'This Year': [moment().startOf('year'), moment().endOf('year')],
                    'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                    'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
                }
            });

            let dtOverrideGlobals = {};
            $('.datatable-Transaction').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        });

        $(document).ready(function () {
            $('#filtersForm').on('submit', function (e) {
                $.get("view-reports" + "?" + 'from-to=' + searchParams.get('from-to'), function (data, status) {
                    if (data) {

                    }

                });


                // validation code here
                if (!valid) {
                    e.preventDefault();

                }

            });
        });

        //Initialise send messages
        $('.action-sms').on("click", function (e) {
            e.stopPropagation();
            SendMultiMessages("organisation(s)","{{route("message-organisation")}}",false)
        });

        //Initialise send emails
        $('.action-mail').on("click", function (e) {
            e.stopPropagation();
            SendMultiEmails("organisation(s)","{{route("email-organisation")}}",false)
        });


    </script>
@endsection
