@extends('layouts/contentLayoutMaster')

@section('title', 'Visitors')

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
                This shows the list of visitors, who had visited the organisation depending on the specified time period
                of the filter
            </p>
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Visitors who visited {{$organisation->name}} so far</h3>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i
                                                class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action="expand"><i
                                                class="feather icon-maximize"></i></a></li>
                                <li><a data-action="reload"><i
                                                class="feather icon-rotate-cw"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors data of this organisation
                            </p>

                            <div class="row pt-1 pb-1">
                                <div class="col-md-6">
                                    <form action="" method="get" id="filtersForm" class="forms">
                                        <div class="input-group">
                                            <input type="text" name="from-to" class="form-control mr-2"
                                                   id="date_filter">
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
                                            <i class="feather icon-send"></i>Send Notifications</a>
                                        <a class="dropdown-item action-checkout" href="javascript:void(0)">
                                            <i class="feather icon-log-out"></i>Checkout visitors</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DataTable starts --}}
                        <div class="table-responsive">
                            <table class="table data-list-view">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>

                                    <th>Name</th>
                                    <th>Host</th>
                                    <th>Office</th>
                                    <th>Phone</th>
                                    <th>ID</th>

                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Appointment</th>
                                    <th>Assets</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach($visitors as $visit)
                                    <tr>
                                        <td class="small" title="{{$visit->id}}"><span class="test"></span></td>
                                        <td class="small">{{$i+=1}}</td>

                                        <td class="small">{{$visit->first_name." ".$visit->last_name}}</td>
                                        <td class="small">{{$visit->host}}</td>
                                        <td class="small">{{$visit->office}}</td>
                                        <td class="small">{{$visit->phone}}</td>
                                        <td class="small">{{$visit->national_id}}</td>

                                        <td class="small">{{date_format(date_create($visit->time_in), 'g:ia')}}</td>
                                        <td class="small">@if($visit->time_out==null)
                                                NA @else {{date_format(date_create($visit->time_out), 'g:ia')}} @endif</td>
                                        <td class="small">

                                            @if(\App\Appointment::where('visitor_id',$visit->id)->get()->count()>0)
                                                <div class="badge badge-pill badge-primary float-right mr-2">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            @else
                                                <div class="badge badge-pill badge-danger float-right mr-2">
                                                    <i class="fa fa-close"></i>
                                                </div>
                                            @endif

                                        </td>
                                        <td class="small">
                                            <div class="dropdown">
                                                <a class="btn-sm btn-icon-only text-light" href="#"
                                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">
                                                    <i class="fas fa-th fa-2x  @if(\App\Asset::where([["organisation_id","=",$visit->organisation_id],["visitor_id","=",$visit->id]],["date_of_visit","=",$visit->date_of_visit])->count()>0) text-blue @else text-gray @endif"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    @php
                                                        $assetCount=0;
                                                    @endphp
                                                    <div class="" style="padding: 4px">
                                                        @if(\App\Asset::where([["organisation_id","=",$visit->organisation_id],["visitor_id","=",$visit->id]],["date_of_visit","=",$visit->date_of_visit])->count()>0)
                                                            <div>
                                                                <table class="table pl-1 pr-1">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Asset</th>
                                                                        <th>Serial</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach(\App\Asset::where([["organisation_id","=",$visit->organisation_id],["visitor_id","=",$visit->id]],["date_of_visit","=",$visit->date_of_visit])->get() as $asset)

                                                                        <tr>
                                                                            <td>
                                                                                {{$asset->name}}
                                                                            </td>
                                                                            <td>
                                                                                {{$asset->serial}}
                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                       class="form-check form-control"
                                                                                       @if($asset->status) checked @endif >
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-between">
                                                                <div class="">
                                                                    Had no assets
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="small">
                                            <button type="button"
                                                    class="btn btn-sm @if($visit->visitor_state==1) btn-secondary @elseif($visit->visitor_state==2) btn-success manageVisitState @else btn-neutral  disabled @endif  waves-effect waves-light"
                                                    title="{{$visit->id}}">
                                                @php
                                                    if($visit->visitor_state==1){
                                                    echo("Expected");
                                                    }elseif ($visit->visitor_state==2){
                                                    echo("Checked in");
                                                    }else{
                                                     echo("Checked out");
                                                    }
                                                @endphp
                                            </button>
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
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view-appoints.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>
    <script src="{{ asset('js/scripts/popover/popover.js') }}"></script>
    <script type="text/javascript" src="{{asset('custom/messaging.js')}}"></script>
    <script>
        $(".manageVisitState").on('click', function () {
            var visID = this.title;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Check out!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling:
                    false,
            }).then(function (result) {
                if (result.value) {

                    $.get('{{route("update-visitor")}}?' + "id=" + visID, function (data, status) {

                            if (data) {
                                Swal.fire({
                                    type: "success",
                                    title: 'Checked out',
                                    text: 'Visitor has been checked out.',
                                    confirmButtonClass: 'btn btn-success',
                                }).then(function () {
                                    window.location.reload();
                                });


                            }
                        }
                    );

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Checking out visitor cancelled',
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            });

        });

    </script>



    <script type="text/javascript" src="{{asset('js/scripts/pickers/dateTime/daterangepicker.js')}}"></script>
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

                    {{--
                     let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                            @can('transaction_delete')
                    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                    let deleteButton = {
                        text: deleteButtonTrans,
                        url: "{{ route('admin.transactions.massDestroy') }}",
                        className: 'btn-danger',
                        action: function (e, dt, node, config) {
                            var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                                return entry.id
                            });

                            if (ids.length === 0) {
                                alert('{{ trans('global.datatables.zero_selected') }}')

                                return
                            }

                            if (confirm('{{ trans('global.areYouSure') }}')) {
                                $.ajax({
                                    headers: {'x-csrf-token': _token},
                                    method: 'POST',
                                    url: config.url,
                                    data: { ids: ids, _method: 'DELETE' }})
                                    .done(function () { location.reload() })
                            }
                        }
                    }
                    dtButtons.push(deleteButton)
                            @endcan

                    let dtOverrideGlobals = {
                            buttons: dtButtons,
                            processing: true,
                            serverSide: true,
                            retrieve: true,
                            aaSorting: [],
                            ajax: {
                                url: "{{ route('admin.transactions.index') }}",
                                data: {
                                    'from-to': searchParams.get('from-to'),
                                }
                            },
                            columns: [
                                { data: 'placeholder', name: 'placeholder' },
                                { data: 'id', name: 'id' },
                                { data: 'transaction_date', name: 'transaction_date' },
                                { data: 'amount', name: 'amount' },
                                { data: 'description', name: 'description' },
                                { data: 'actions', name: '{{ trans('global.actions') }}' }
                            ],
                            order: [[ 1, 'asc' ]],
                            pageLength: 100,
                        };
                    --}}
            let dtOverrideGlobals = {};
            $('.datatable-Transaction').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        });


        $(document).ready(function () {
            $('#filtersForm').on('submit', function (e) {
                //portal/visitors
                $.get("visitors" + "?" + 'from-to=' + searchParams.get('from-to'), function (data, status) {
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
            SendMultiMessages("visitor(s)","{{route("message-visitor")}}",false)
        });

        //Initialise send emails
        $('.action-mail').on("click", function (e) {
            e.stopPropagation();
            SendMultiEmails("visitor(s)","{{route("email-visitor")}}",false)
        });

        /*****************Checking out visitors*********************/
        $('.action-checkout').on("click", function (e) {
            e.stopPropagation();

            let checkboxes = document.getElementsByClassName('dt-checkboxes');
            var checkedCount = 0, checkedOutCount = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked)
                    continue;
                checkedCount++;

                var checkIDTitle = checkboxes[i].closest('td').title;

                $.get('{{route("update-visitor")}}?' + "id=" + checkIDTitle, function (data, status) {
                    if (data) {
                        checkedOutCount++;
                    }

                })
            }
            if (checkedCount > 0) {
                Swal.fire({
                    title: checkedCount + ' Visitors Checked Out',
                    animation: false,
                    customClass: 'animated bounceIn',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                }).then(function () {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    title: "Warning!",
                    text: "You haven't selected anything",
                    type: "warning",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }

        });
        /*****************Checking out visitors end*********************/
    </script>
@endsection
