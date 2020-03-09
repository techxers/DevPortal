@extends('layouts/contentLayoutMaster')

@section('title', 'All Reports')

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

                    <div class="card-content">
                        <div class="card-body card-dashboard">
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

                </div>
            </div>
        </div>
    </section>

    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Billing reports for {{\App\Organisation::all()->count()-1}}
                            Organisations</h3>

                    </div>

                    {{-- Data list view starts --}}
                    <section id="data-list-view" class="data-list-view-header">

                        <br>
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
                                        <a class="dropdown-item action-delete" href="javascript:void(0)">
                                            <i class="feather icon-trash"></i>Delete</a>

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
                                    <th>Product</th>
                                    <th>Plan</th>
                                    <th>Date</th>
                                    <th>Amount Paid</th>
                                    <th>Period</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $count=1;
                                @endphp
                                @foreach(\App\Subscription::all() as $subscription)
                                    @if($subscription->organisation->id==1)
                                        @continue;
                                    @endif
                                    <tr>
                                        <td class="small" title="{{$subscription->id}}"></td>
                                        <td class="small">{{$count++}}</td>
                                        <td class="small">{{$subscription->organisation->name}}</td>
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
    <script src="{{ asset('js/scripts/ui/data-list-view-appoints.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>
    <script src="{{ asset('js/scripts/popover/popover.js') }}"></script>
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
                $.get("reports" + "?" + 'from-to=' + searchParams.get('from-to'), function (data, status) {
                    if (data) {

                    }

                });


                // validation code here
                if (!valid) {
                    e.preventDefault();

                }

            });
        });





        /*****************Multiple Notification*********************/
        $('.action-sms').on("click", function (e) {
            e.stopPropagation();
            Swal.fire({
                title: 'Message This Organisations',
                text: 'Specify the message in the below field',
                input: "textarea",
                inputValue: '',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Send',
                cancelButtonClass: "btn btn-danger ml-1",
            }).then(function (result) {
                if (result.value) {

                    let checkboxes = document.getElementsByClassName('dt-checkboxes');
                    var checkedCount = 0, checkedOutCount = 0;

                    for (var i = 0; i < checkboxes.length; i++) {
                        if (!checkboxes[i].checked)
                            continue;
                        checkedCount++;

                        var checkIDTitle = checkboxes[i].closest('td').title;

                        $.get("organisations/sms" + "?" + 'id=' + checkIDTitle + "&sms=" + result.value, function (data, status) {
                            if (data) {
                                checkedOutCount++;

                            }

                        })
                    }
                    if (checkedCount > 0) {
                        Swal.fire({
                            title: checkedCount + ' Notifications Sent',
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
                }
            });
        });
        /*****************Multiple Notification*********************/


        /*****************Checking out visitors*********************/
        $('.action-mail').on("click", function (e) {
            e.stopPropagation();


            const {value: formValues} = swal.fire({
                title: 'Sending Notification Emails',
                html:
                    ' <div class="col-sm-12 data-field-col pt-2">\n' +
                    '                                                    <div><input type="text" style="visibility: hidden" autofocus></div>' +
                    '                                                    <label for="data-name" style="font-size: 18px">Subject</label>\n' +
                    '                                                    <input type="text" class="form-control pt-2" name="subject"\n' +
                    '                                                           id="email-subject"\n' +
                    '                                                           value="" placeholder="email subject" required>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-sm-12 data-field-col pt-2">\n' +
                    '                                                    <label for="data-price" style="font-size: 18px">Message</label>\n' +
                    '                                                    <textarea type="text" class="form-control" name="message"\n' +
                    '                                                              id="email-message" rows="12" placeholder="email message" \n' +
                    '                                                              style="text-align: left;align-content:start" required>\n' +
                    '                                                    </textarea>\n' +
                    '                                                </div>\n',
                focusConfirm: false,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonClass: "btn btn-danger ml-1"
            }).then(function (result) {

                let checkboxes = document.getElementsByClassName('dt-checkboxes');
                var checkedCount = 0, checkedOutCount = 0, successRate = 0, failureRate = 0;


                for (var i = 0; i < checkboxes.length; i++) {
                    if (!checkboxes[i].checked)
                        continue;
                    checkedCount++;


                    var checkIDTitle = checkboxes[i].closest('td').title;

                    $.ajax({
                        type: "POST",
                        data: {
                            "subject": document.getElementById('email-subject').value,
                            "message": document.getElementById('email-message').value,
                            "id": checkIDTitle
                        },
                        url: '{{route('send-notify-mail')}}',
                        success: successFunc,
                        error: errorFunc
                    });

                    function successFunc(data, status) {
                        successRate++;

                    }

                    function errorFunc(data, status) {
                        failureRate++;
                    }
                }

                if (checkedCount < 1) {
                    Swal.fire({
                        title: "Warning!",
                        text: "You haven't selected anything",
                        type: "warning",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                } else {
                    Swal.fire({
                        title: "Status",
                        text: successRate + " Success " + failureRate + " Failures Email Notification Sent ",
                        type: "info",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        window.location.reload();
                    });
                }
            });

        });
        /*****************Checking out visitors*********************/


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
