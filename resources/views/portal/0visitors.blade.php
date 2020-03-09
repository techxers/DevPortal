@extends('layouts/contentLayoutMaster')

@section('title', 'Visitor Logs')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">

@endsection
@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <p>Visitors list display</p>
        </div>
    </div>
    <div style="display:none">{{$orgt=$organisation->name}}</div>
    <!-- Complex headers table -->
    <section id="headers">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Today's Visitors</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Table list of the particular visitors who visited <span
                                        class="text-blue">{{$orgt}}</span>
                            </p>
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>

                                    <tr>

                                        <th>Name</th>
                                        <th>Host</th>
                                        <th>Office</th>
                                        <th>Phone</th>
                                        <th>ID</th>
                                        <th>Assets</th>
                                        <th>Time in</th>
                                        <th>Time out</th>
                                        <th>Appointment</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($visitors as $visit)
                                        <!--if($event[$i]->created_at->format('d.m.Y') == \Carbon::today() )-->
                                        @if(!$visit->created_at->isToday())
                                            @continue;
                                        @endif
                                        <tr>

                                            <td>{{$visit->first_name." ".$visit->last_name}}</td>
                                            <td>{{$visit->host}}</td>
                                            <td>{{$visit->office}}</td>
                                            <td>{{$visit->phone}}</td>
                                            <td>{{$visit->national_id}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn-sm btn-icon-only text-light" href="#"
                                                       role="button" data-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i class="fas fa-th fa-2x @if(!is_null($visit->assets)) text-blue @else text-gray @endif"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <div class="p-1">
                                                            @if(is_null($visit->assets))
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="">
                                                                        Had no assets
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @foreach(explode(',',rtrim($visit->assets,",")) as $asset)
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="">
                                                                            {{$asset}}
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="checkbox" checked>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>{{date_format(date_create($visit->time_in), 'g:ia')}}</td>
                                            <td>@if($visit->time_out==null)
                                                    NA @else {{date_format(date_create($visit->time_out), 'g:ia')}} @endif</td>
                                            <td>

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
                                            <td>
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
                                    {{--
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Host</th>
                                        <th>Department</th>
                                        <th>Phone</th>
                                        <th>Email address</th>
                                        <th>National id</th>
                                    </tr>
                                    </tfoot>
                                    --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/ Complex headers table -->



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
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>

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
                html:
                    '<div class="pt-1">\n' +
                    '                                <div class="pl-1 text-right">\n' +
                    '                                    <h5 class="text-md-left">Visitor Assets</h5>\n' +
                    '                                    <table class="table table-responsive">\n' +
                    '                                        @foreach($visitors as $visit)\n' +
                    '                                            <tbody class="pkgs">\n' +
                    '                                            @foreach(explode(',',rtrim($visit->assets,",")) as $asset)\n' +
                    '                                                <tr><div class="d-flex"> ' +
                    '                                                 <div class=""><input type="checkbox" checked></div>' +
                    '                                                      <div class="pl-2">{{$asset}}</div>\n' +
                    '                                                  </tr>\n' +
                    '                                            @endforeach\n' +
                    '                                            </tbody>\n' +
                    '                                        @endforeach\n' +
                    '                                    </table>\n' +
                    '                                </div>\n' +
                    '                            </div> ',
                buttonsStyling: false,
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
@endsection
