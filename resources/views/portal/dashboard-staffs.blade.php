@extends('layouts/contentLayoutMaster')

@section('title', 'Client Dashboard')

@section('vendor-style')
    {{-- vednor css files --}}
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>
    <link href="{{asset('css/nt-styles.css')}}" rel="stylesheet"/>

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
            min-height: 572px;
            background-image: url({{asset('img/theme/summary3bg.png')}});
            background-size: contain;
            background-position: center top;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/plugins/forms/wizard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">

@endsection

@section('content')
    <section id="dashboard-analytics">
        <div class="dashboard-bg"
             style=""></div>
        <div style="padding-top:128px"></div>
        <div class="row header-cards mb-3">
            <div class="col-xl-4 col-lg-6">
                <div class="clock" id="clock"></div>
                <div class="dmy">
                    <div class="date cs-text-shadow-white">
                        <!-- Date-JavaScript -->
                        <script type="text/javascript">
                            var mydate = new Date();
                            var year = mydate.getYear();
                            if (year < 1000)
                                year += 1900;
                            var day = mydate.getDay();
                            var month = mydate.getMonth();
                            var daym = mydate.getDate();
                            if (daym < 10)
                                daym = "0" + daym;
                            var dayarray = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                            var montharray = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            document.write("" + daym + ", " + year + "<br>" + dayarray[day] + "," + montharray[month] + " ")
                        </script>
                        <!-- //Date-JavaScript -->
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6">
                <div>
                    <h1 class="display-2 text-white cs-text-shadow text-capitalize">
                        <script type="text/javascript">
                            var day = new Date();
                            var hr = day.getHours();
                            if (hr >= 0 && hr < 12) {
                                document.write("Good Morning");
                            } else if (hr == 12) {
                                document.write("Good Noon");
                            } else if (hr >= 12 && hr <= 17) {
                                document.write("Good Afternoon");
                            } else {
                                document.write("Good Evening");
                            }
                        </script>
                        {{explode(' ',trim($user->name))[0]}}</h1>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0 cs-card-2"
                             style="background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);">
                            <div class="card-body">
                                v
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  mb-0 cs-text-shadow-white"
                                            style="font-size: 24px!important;">Visitors Signed</h5>
                                        <span class="text-right font-weight-bold mb-0 cs-text-shadow-white" style="font-size: 64px;color: #696969">
                                            {{\App\Visitor::where("organisation_id",$organisation->id)->get()->count()}}
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0 cs-card-4"
                             style="background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  mb-0 cs-text-shadow-white"
                                            style="font-size: 23px!important;">Today's Appointments</h5>
                                        <span class="text-right font-weight-bold mb-0 cs-text-shadow-white" style="font-size: 64px;color: #696969">
                                            {{\App\Appointment::where('organisation_id',$organisation->id)->count()}}
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div style="margin-bottom: 50px"></div>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                <section id="basic-examples">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="cal-category-bullets d-none">
                                            <div class="bullets-group-1 mt-2 d-flex">
                                                <div class="category-business mr-1">
                                                    <span class="bullet bullet-success bullet-sm mr-25"></span>
                                                    Business
                                                </div>
                                                <div class="category-work mr-1">
                                                    <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                                    Work
                                                </div>
                                                <div class="category-personal mr-1">
                                                    <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                                    Personal
                                                </div>
                                                <div class="category-others">
                                                    <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                                    Others
                                                </div>
                                            </div>
                                        </div>
                                        <div id='fc-calendarSystem'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calendar Modal starts-->
                    <div class="modal fade text-left modal-calendar" tabindex="-1" role="dialog"
                         aria-labelledby="cal-modal"
                         aria-modal="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm"
                             role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title cs-heading" id="cal-modal">Add a Todo</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="{{route('add-todo')}}" method="post">
                                    @csrf;
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-between align-items-center add-category">
                                            <div class="chip-wrapper"></div>

                                            <div class="label-icon pt-1 pb-2 dropdown calendar-dropdown">
                                                <i class="feather icon-tag dropdown-toggle" id="cal-event-category"
                                                   data-toggle="dropdown"></i>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                     aria-labelledby="cal-event-category">
                  <span class="dropdown-item business" data-color="success">
                    <span class="bullet bullet-success bullet-sm mr-25"></span>
                    Business
                  </span>
                                                    <span class="dropdown-item work" data-color="warning">
                    <span class="bullet bullet-warning bullet-sm mr-25"></span>
                    Work
                  </span>
                                                    <span class="dropdown-item personal" data-color="danger">
                    <span class="bullet bullet-danger bullet-sm mr-25"></span>
                    Personal
                  </span>
                                                    <span class="dropdown-item others" data-color="primary">
                    <span class="bullet bullet-primary bullet-sm mr-25"></span>
                    Others
                  </span>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="cal-event-title"
                                                   placeholder="Todo Title" name="title" required>
                                            <label for="cal-event-title">Todo Title</label>
                                        </fieldset>
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="cal-start-date"
                                                   placeholder="When is it?" name="date" readonly>
                                            <label for="cal-start-date">Date</label>
                                        </fieldset>
                                        <fieldset class="form-label-group">
                                            <input type="time" class="form-control pickatime" id="cal-end-date"
                                                   placeholder="At what time?" name="time" required>
                                            <label for="cal-end-date">Time</label>
                                        </fieldset>
                                        <fieldset class="form-label-group">
                                            <textarea class="form-control" id="cal-description" rows="5"
                                                      placeholder="Description" name="description" required></textarea>
                                            <label for="cal-description">Description</label>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit"
                                                class="btn btn-primary cal-add-event waves-effect waves-light">
                                            Add Todo
                                        </button>

                                        <button type="button"
                                                class="btn btn-flat-danger cancel-event waves-effect waves-light"
                                                data-dismiss="modal">Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- calendar Modal ends-->
                </section>
            </div>
            <div class="col-lg-4 col-md-6 col-12" id="todo">
                <form class="card" name="view-todos">
                    <div class="card-header">
                        <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">
                            Your Todos</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{--<ul class="activity-timeline timeline-left list-unstyled">
                                <li>
                                    <div class="timeline-icon bg-primary">
                                        <i class="feather icon-plus font-medium-2 align-middle"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold mb-0">Client Meeting</p>
                                        <span class="font-small-3">Bonbon macaroon jelly beans gummi bears jelly lollipop apple</span>
                                    </div>
                                    <small class="text-muted">25 mins ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-warning">
                                        <i class="feather icon-alert-circle font-medium-2 align-middle"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold mb-0">Email Newsletter</p>
                                        <span class="font-small-3">Cupcake gummi bears soufflé caramels candy</span>
                                    </div>
                                    <small class="text-muted">15 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-danger">
                                        <i class="feather icon-check font-medium-2 align-middle"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold mb-0">Plan Webinar</p>
                                        <span class="font-small-3">Candy ice cream cake. Halvah gummi bears</span>
                                    </div>
                                    <small class="text-muted">20 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-success">
                                        <i class="feather icon-check font-medium-2 align-middle"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold mb-0">Launch Website</p>
                                        <span class="font-small-3">Candy ice cream cake. </span>
                                    </div>
                                    <small class="text-muted">25 days ago</small>
                                </li>
                                <li>
                                    <div class="timeline-icon bg-primary">
                                        <i class="feather icon-check font-medium-2 align-middle"></i>
                                    </div>
                                    <div class="timeline-info">
                                        <p class="font-weight-bold mb-0">Marketing</p>
                                        <span class="font-small-3">Candy ice cream. Halvah bears Cupcake gummi bears.</span>
                                    </div>
                                    <small class="text-muted">28 days ago</small>
                                </li>
                            </ul>--}}
                            <ul class="activity-timeline timeline-left list-unstyled">
                                @php
                                    $categoryText = array("Others"=>"primary",
                                            "Business"=>"success",
                                              "Personal"=>"danger",
                                              "Work"=> "warning");
                                @endphp
                                @foreach($user->todos as $todo)
                                    <li>
                                        <div class="timeline-icon bg-{{$categoryText[$todo->category]}}">
                                            <i class="feather icon-alert-circle font-medium-2 align-middle">

                                            </i>
                                        </div>
                                        <div class="timeline-info">
                                            <div class="d-flex justify-content-between ">
                                                <p class="font-weight-bold mb-0">{{$todo->title}}</p>
                                                <a href="javascript:void(0);" class="fa fa-close close-todo"
                                                   id="close-todo" title="{{$todo->id}}"></a>
                                            </div>
                                            <span class="font-small-3">{{$todo->description}}</span>
                                        </div>
                                        <small class="text-muted">
                                            {{date_format( date_create($todo->dateTime), 'g:ia \o\n l jS F Y')}}
                                        </small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection

@section('vendor-script')
    {{-- vednor files --}}
    <script src="{{ asset('vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>

@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="{{ asset('js/scripts/forms/wizard-steps.js') }}"></script>

    <!-- //calendar -->
    <!-- clock js -->
    <script type="text/javascript" src="{{asset('css/flipclock/clock-1.1.0.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/fullcalendar.js') }}"></script>
    <script>
        var clock = $("#clock").clock(),
            data = clock.data('clock');

        // data.pause();
        // data.start();
        // data.setTime(new Date());

        var d = new Date();
        d.setHours(9);
        d.setMinutes(51);
        d.setSeconds(20);
    </script>
    <!-- //clock js -->
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script>
        var form = document.forms['view-todos'];

        $(".close-todo").click(function () {
            $.get('portal/todo/remove?' + "id=" + this.title, function (data, status) {
                    // window.location.assign({{route('dashboard')}});
  //                  this.attrs('display', 'none');
                    window.location.reload();
                }
            );
        });
    </script>


    <script>
        var colors = {
            primary: "#7367f0",
            success: "#28c76f",
            danger: "#ea5455",
            warning: "#ff9f43"
        };
        calSystemCategory = {
            primary: "Others",
            success: "Business",
            danger: "Appointments",
            warning: "Work"
        };

        window.onload = function () {
                    @php
                        $appointments = \App\Appointment::where('organisation_id', $organisation->id)->get();
                    @endphp

                    @foreach($appointments as $appoint)
                    @if(($appoint->status)!="pending")
                    @continue
                    @endif

            var eventTitle = "Appointment\n{{$appoint->visitor->first_name}}",
                startDate = '{{$appoint->dateTime}}',
                endDate = '{{$appoint->dateTime}}',
                eventDescription = 'Appointment in {{$appoint->visitor->office}} office to see the {{$appoint->visitor->host}}',
                correctEndDate = new Date(endDate);
            calendarSystem.addEvent({
                id: "newEvent",
                title: eventTitle,
                start: startDate,
                end: correctEndDate,
                database_id: '{{$appoint->id}}',
                description: eventDescription,
                color: colors.success,
                dataEventColor: "business",
                allDay: true
            });

            @endforeach


            /*TOdos-----------------------------------------------------*/

            @foreach($user->todos as $todo)

                eventTitle = "Todos\n{{$todo->title}}",
                startDate = '{{$todo->dateTime}}',
                endDate = '{{$todo->dateTime}}',
                eventDescription = '{{$todo->description}}',
                correctEndDate = new Date(endDate);
            calendarSystem.addEvent({
                id: "newEvent",
                title: eventTitle,
                start: startDate,
                end: correctEndDate,
                description: eventDescription,
                color: colors.primary,
                dataEventColor: "others",
                allDay: true
            });

            @endforeach
        };
        $(document).on("click", ".fc-day", function () {
            $(".modal-calendar").modal("show");
            $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
            $(".modal-calendar .cal-submit-event").addClass("d-none");
            $(".modal-calendar .remove-event").addClass("d-none");
            $(".modal-calendar .cal-add-event").removeClass("d-none");
            $(".modal-calendar .cancel-event").removeClass("d-none");
            $(".modal-calendar .add-category .chip").remove();
            $(".modal-calendar .modal-footer .btn").attr("disabled", true);
            evtColor = colors.primary;
            eventColor = "primary";
        });

    </script>
@endsection