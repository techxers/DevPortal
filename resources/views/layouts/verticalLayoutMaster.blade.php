<body class="vertical-layout vertical-menu-modern {{$user->config->theme}} 2-columns  navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


{{--
Old menu recent
<body class="vertical-layout vertical-menu-modern @if($user->config->theme=='dark') dark-layout @endif content-left-sidebar todo-application navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">


collapsed
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


dark
<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">


normal
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


semi dark
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

--}}
{{-- Include Sidebar --}}
@include('panels.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    {{-- Include Navbar --}}
    @include('panels.navbar')

    <div class="content-wrapper">

        @can('for-superAdmin', $user)
            @include('panels/sidebar-register')
        @endCan
        @can('for-admin', $user)
            @include('panels/sidebar-subscribe')
        @endCan


        <div class="content-header row">

        </div>
        <div class="content-body">
            {{-- Include Page Content --}}
            @yield('content')
            {{--

                        @include('panels/calendar-modal')
            --}}
        </div>
    </div>

</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

{{-- include footer --}}
@include('panels/footer')

{{-- include default scripts --}}
@include('panels/scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{{-- Include page script --}}
@yield('myscript')


</body>
</html>
