{{-- Vendor Styles --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
<link rel="stylesheet" href="{{ asset('vendors/css/vendors.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/ui/prism.min.css') }}">
{{-- Theme Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-extended.css') }}">
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">
<link rel="stylesheet" href="{{ asset('css/components.css') }}">
<link rel="stylesheet" href="{{ asset('css/themes/dark-layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/themes/semi-dark-layout.css') }}">
{{-- {!! Helper::applClasses() !!} --}}

{{-- Layout Styles works when don't use customizer --}}
{{-- @if($configData['theme'] == 'dark-layout')
        <link rel="stylesheet" href="{{ asset('css/themes/dark-layout.css')) }}">
@endif
@if($configData['theme'] == 'semi-dark-layout')
        <link rel="stylesheet" href="{{ asset('css/themes/semi-dark-layout.css')) }}">
@endif --}}
{{-- Customizer Styles --}}
{{-- Page Styles --}}
<link rel="stylesheet" href="{{ asset('css/core/menu/menu-types/horizontal-menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" href="{{ asset('css/core/colors/palette-gradient.css') }}">
{{-- Page Styles --}}
@yield('page-style')

<link rel="stylesheet" href="{{asset('fonts/font-awesome/5.12/css/all.min.css')}}"/>

<link href="{{asset('custom/nt-styles.css')}}" rel="stylesheet"/>

<link rel="stylesheet" href="{{ asset('vendors/css/calendars/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/calendars/extensions/daygrid.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/calendars/extensions/timegrid.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">

@yield('bottom-styles')




