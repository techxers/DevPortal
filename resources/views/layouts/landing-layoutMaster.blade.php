<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="description"
          content="NeutronIT is a team of innovative and creative professionals who understand the need of customer focused solutions. With our experience you can trust us to provide you with high quality and secure software solutions.">
    <meta name="keywords" content="vsm kenya, visitor management, visitors">
    <meta name="author" content="Neutron IT ">
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="http://neutronit.com/www.neutronit.com"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @include('panels/landing-styles')
    @yield('page-styles')
</head>


<body class="home page-template-default page page-id-4547 _masterslider _msp_version_3.2.7 gdlr-carousel-no-scroll">
<div class="body-wrapper  float-menu gdlr-header-websolid" data-home="#">

    {{-- Include Page Content --}}
    @yield('content')


</div> <!-- .site-wrap -->

@yield('page-scripts')

{{-- include default scripts --}}
@yield('top-scripts')
@include('panels/landing-scripts')

@yield('bottom-scripts')
</body>
</html>
