@extends('layouts/contentLayoutMaster')

@section('title', 'Appointments')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">

@endsection

@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <p>System will send an email and sms for in one day before to notify users of his appointment
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">This week appointments</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors appointments of this organisation
                            </p>
                            <div class="table-responsive">
                                <table class="table zero-configuration"
                                >
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>

                                        <th scope="col">Phone</th>

                                        <th scope="col">Host</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Days</th>
                                        <th scope="col">Notification</th>
                                        <th scope="col">Status</th>
                                        @can('for-allAdmins', $user)
                                        <th scope="col">Notify</th>
                                            @endcan
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach($appointments as $appoint)
                                        <tr>
                                            <td>{{$i+=1}}</td>

                                            <td>{{$appoint->visitor->phone}}</td>
                                            <td>{{$appoint->visitor->host}}</td>
                                            <td>{{$appoint->visitor->office}}</td>
                                            {{date_format(date_create($appoint->dateTime), 'l jS F Y')}}<td style="font-size: 12px"></td>
                                            <td>{{date_format(date_create($appoint->dateTime), 'g:i A')}}</td>
                                            <td>
                                                @php
                                                    $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                                    $datetime2 =new DateTime($appoint->dateTime);

                                                    $interval = $datetime2->diff($datetime1);
                                                    echo abs($interval->format('%R%a days'));
                                                @endphp
                                                days
                                            </td>
                                            <td class="center text-center">
                                                @if($appoint->notified<1)
                                                    <div class="badge badge-pill badge-danger float-right mr-2">
                                                        <i class="fa fa-close"></i>
                                                    </div>
                                                @else
                                                    <div class="badge badge-pill badge-primary float-right mr-2">
                                                        <i class="fa fa-check"></i>
                                                    </div>

                                                @endif
                                            </td>
                                            <td>

                                                <select class="p-0 m-0 form-control  staff-input btn  waves-effect waves-light appointMgt @if($appoint->status=="pending") btn-warning @elseif($appoint->status=="completed") btn-primary @elseif($appoint->status=="rejected") btn-danger @endif"
                                                        name="{{$appoint->id}}"
                                                        style="width: 100px;font-size: 11px"
                                                        @if($appoint->status!="pending") disabled @endif>
                                                    <option @if($appoint->status=="completed") selected
                                                            @endif value="completed">
                                                        Completed
                                                    </option>
                                                    <option @if($appoint->status=="pending") selected
                                                            @endif value="pending">
                                                        Pending
                                                    </option>
                                                    <option @if($appoint->status=="rejected") selected
                                                            @endif value="rejected">
                                                        Rejected
                                                    </option>
                                                </select>
                                            </td>
                                            @can('for-allAdmins', $user)
                                            <td>
                                                <button class="btn  btn-primary waves-effect waves-light btn-sm pl-1 pr-1 sendNotify"
                                                        title="{{$appoint->id}}" @if($role->id>2) disabled @endif>
                                                    <i class="feather icon-send"></i>
                                                </button>
                                            </td>
                                                @endcan
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
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>

    <script>
        $(".appointMgt").change(function () {
            var val = this.value;
            var thisSelect = this;
            $.get("appointment/update" + "?" + 'id=' + this.name + "&status=" + this.value + "", function (data, status) {
                if (data) {

                    Swal.fire({
                        title: "Success",
                        text: "Appointment " + val,
                        type: "success",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        thisSelect.disabled = true;
                    });
                }

            })
        });

        $(".sendNotify").click(function () {
            var notify = this.value;
            notify.disabled = true;
            $.get("appointment/notify" + "?" + 'id=' + this.title, function (data, status) {
                if (data) {

                    Swal.fire({
                        title: 'Notification sent',
                        text: data,
                        animation: false,
                        customClass: 'animated bounceIn',
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        notify.disabled = false;
                        window.location.reload();
                    });
                }

            })
        });

    </script>
@endsection
