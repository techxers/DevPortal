<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Neutron VMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/brand/browser_baricon.png')}}">

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')
    {{-- Include page Style --}}
    @yield('mystyle')
    <link rel="stylesheet" href="{{ asset('css/plugins/calendars/fullcalendar.css') }}">

</head>

@extends('layouts.verticalLayoutMaster' )
