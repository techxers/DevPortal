@extends('layouts/contentLayoutMaster')

@section('title', 'Reactivate Account')

@section('vendor-style')
    {{-- vednor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/charts/apexcharts.css')}}">
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>
    <link href="{{asset('custom/nt-styles.css')}}" rel="stylesheet"/>
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
            min-height: 500px;
            background-image: url({{asset('img/theme/summary2bg.png')}});
            background-size: contain;
            background-position: center top;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">


@endsection
@section('content')
    <section>

        <div class="pt-2 pb-2">
            <h1 class="text-red">The Account for this organisation has been blocked</h1>
            <br>
            <h5>Contact your following administrators to reactivate account</h5>

            <ul>
            @foreach($organisation->users as $admin)
                @if($admin->role_id<3)
                <li class="pt-1">Admin: <span class="small">{{$admin->name}}</span></li>
                @endif
            @endforeach
            </ul>

        </div>


    </section>
@endsection

@section('vendor-script')
    {{-- vednor files --}}
    <script src="{{ asset('vendors/js/charts/apexcharts.min.js')}}"></script>

    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>

@endsection
