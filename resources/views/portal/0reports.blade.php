@extends('layouts/contentLayoutMaster')

@section('title', 'Reports Management')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">

@endsection

@section('content')
    <div class="accordion" id="accordionExample">
        @can('for-superAdmin',$user)
            <div class="collapse-margin">
                <div class="card-header " id="headingOne" data-toggle="collapse" role="button"
                     data-target="#collapseOne"
                     aria-expanded="false" aria-controls="collapseOne">
                  <span class="lead collapse-title">
                   Billing reports
                  </span>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="card bg-blue">
                            <div class="card-header">
                                <h3 class="card-title brand-blue cs-text-shadow-white">Billing reports
                                    for {{\App\Organisation::all()->count()}}
                                    organisations</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>Organisation</th>
                                                <th>Email</th>
                                                <th class="text-uppercase">Subscription</th>
                                                <th class="text-uppercase">Date Subscribed</th>
                                                <th class="text-uppercase">Subscription Period</th>
                                                <th class="text-uppercase">Amount Paid</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Subscription::all() as $subs)
                                                <tr>
                                                    <td>{{$subs->organisation->name}}</td>
                                                    <td>
                                                        <a href="mailto:{{$subs->organisation->email}}">{{$subs->organisation->email}}</a>
                                                    </td>
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
                                                    <td>{{$subs->subscribed_on}}</td>
                                                    <td>
                                                        @foreach(explode("%",trim($subs->plans)) as $subs_title)
                                                            @if(!is_numeric($subs_title))
                                                                @continue
                                                            @endif

                                                            {{$plan=\App\Plan::find($subs_title)->period}}
                                                        @endforeach
                                                    </td>
                                                    <td> {{$subs->amount_paid}}</td>
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
        @endcan
        <div class="collapse-margin">
            <div class="card-header" id="headingTwo" data-toggle="collapse" role="button" data-target="#collapseTwo"
                 aria-expanded="false" aria-controls="collapseTwo">
                  <span class="lead collapse-title">
                    All walking ins
                  </span>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                <div class="card-body">
                    <div class="card bg-blue">
                        <div class="card-header">
                            <h3 class="card-title brand-blue cs-text-shadow-white">All visitor walk ins
                                for {{$organisation->name}}</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>ID Number</th>
                                            <th>Date</th>
                                            <th>Time in</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($visitors as $visit)
                                            <tr>
                                                @if($visit->visitor_state!=2)
                                                    @continue
                                                @endif
                                                <td>{{$visit->first_name." ".$visit->last_name}}</td>
                                                <td class="text-lowercase">{{$visit->email}}</td>
                                                <td>{{$visit->office}}</td>
                                                <td>{{$visit->phone}}</td>
                                                <td>{{$visit->national_id}}</td>
                                                <td>{{date_format(date_create($visit->date_of_visit), 'd/m/Y')}}</td>
                                                <td>{{date_format(date_create($visit->date_of_visit), 'g:i A')}}</td>
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
        <div class="collapse-margin">
            <div class="card-header" id="headingThree" data-toggle="collapse" role="button" data-target="#collapseThree"
                 aria-expanded="false" aria-controls="collapseThree">
                  <span class="lead collapse-title">
                    All appointments
                  </span>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title brand-blue cs-text-shadow-white">All appointments
                                for {{$organisation->name}}</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>ID Number</th>
                                            <th>Person</th>
                                            <th>Office</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $appointments = \App\Appointment::where('organisation_id', $organisation->id)->get();

                                        @endphp
                                        @foreach($appointments as $appoint)
                                            <tr>
                                                <td>{{$appoint->visitor->first_name." ".$appoint->visitor->last_name}}</td>
                                                <td>{{$appoint->visitor->phone}}</td>
                                                <td>{{$appoint->national_id}}</td>
                                                <td>{{$appoint->visitor->host}}</td>
                                                <td>{{$appoint->visitor->office}}</td>
                                                <td>{{date_format(date_create($visit->dateTime), 'd/m/Y')}}</td>
                                                <td>{{date_format(date_create($visit->dateTime), 'g:i A')}}</td>
                                                <td>{{$appoint->status}}</td>

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
        <div class="collapse-margin">
            <div class="card-header" id="headingFour" data-toggle="collapse" role="button" data-target="#collapseFour"
                 aria-expanded="false" aria-controls="collapseFour">
                  <span class="lead collapse-title">
                   All checked out
                  </span>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title brand-blue cs-text-shadow-white">Visitors who checked out
                                of {{$organisation->name}}</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>ID Number</th>
                                            <th>Date</th>
                                            <th>Time in</th>
                                            <th>Time Out</th>
                                            <th>Average</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($visitors as $visit)
                                            <tr>
                                                @if($visit->visitor_state!=3)
                                                    @continue
                                                @endif
                                                <td>{{$visit->first_name." ".$visit->last_name}}</td>
                                                <td class="text-lowercase">{{$visit->email}}</td>
                                                <td>{{$visit->office}}</td>
                                                <td>{{$visit->phone}}</td>
                                                <td>{{$visit->national_id}}</td>
                                                <td>{{date_format(date_create($visit->date_of_visit), 'd/m/Y')}}</td>
                                                <td>{{date_format(date_create($visit->time_in), 'g:i A')}}</td>
                                                <td>{{date_format(date_create($visit->time_out), 'g:i A')}}</td>
                                                <td>

                                                    @php
                                                    $datetime1 = strtotime($visit->time_in);
                                                    $datetime2 = strtotime($visit->time_out);
                                                    $interval = ceil($datetime1-$datetime2);
                                                    echo (round(abs($interval/60/60),2));
                                                    @endphp
                                                     hrs

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
    </div>

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


@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
@endsection
