@extends('layouts/contentLayoutMaster')

@section('title', 'Visitor Logs')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <p>Click 'view more' to view more additional information
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Organisations & Visitors</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors connected to a particular organisation
                            </p>
                            <div class="table-responsive">
                                <table class="table nowrap scroll-horizontal-vertical" style="width: 100%!important;">
                                    <thead>
                                    <tr>
                                        <th>Organisation Name</th>
                                        <th>Total Visitors</th>
                                        <th>View More</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Organisation::all() as $org)
                                        <div style="display: none">{{$visCount=\App\Visitor::where('organisation_id',$org->id)->count()}}</div>
                                        <tr>
                                            <td>{{$org->name}}</td>
                                            <td>{{$visCount}}</td>
                                            <td>
                                                <a class="chip @if($visCount>0) chip-primary @else chip-secondary @endif mr-1"
                                                   href="@if($visCount>0) {{route('visitors-org',['organisation_id' => \Illuminate\Support\Facades\Crypt::encrypt($org->id) ])}} @else javascript:void(0) @endif">
                                                    <div class="chip-body">

                                                        <span class="chip-text">View More</span>

                                                    </div>
                                                </a>
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
@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
@endsection
