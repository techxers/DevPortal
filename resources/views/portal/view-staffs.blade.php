@extends('layouts/contentLayoutMaster')

@section('title', 'Staffs List')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/ag-grid/ag-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/ag-grid/ag-theme-material.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">

@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/app-user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/aggrid.css') }}">
@endsection

@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/sidebar-addstaff.css') }}">
@endsection


@section('content')
    <!-- users list start -->
    <section class="users-list-wrapper">
        <!-- users filter start -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Filters</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                        <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="users-list-filter">
                        <form>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label for="users-list-role">Role</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-role">
                                            <option value="">All</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Reception">Reception</option>
                                            <option value="Security">Security</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label for="users-list-status">Status</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-status">
                                            <option value="">All</option>
                                            <option value="Active">Active</option>
                                            <option value="Blocked">Blocked</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <label for="users-list-verified">Verified</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-verified">
                                            <option value="">All</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- users filter end -->
        <!-- Ag Grid users list section start -->
        <div id="basic-examples">
            <div class="card">
                <div class="card-header">
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i
                                            class="feather icon-chevron-down"></i></a></li>
                            <li><a data-action="expand"><i
                                            class="feather icon-maximize"></i></a></li>
                            <li><a data-action="reload"><i
                                            class="feather icon-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                    <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                        <button class="btn btn-white filter-btn dropdown-toggle border text-dark"
                                                type="button"
                                                id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            1 - 20 of 50
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                             aria-labelledby="dropdownMenuButton6">
                                            <a class="dropdown-item" href="#">20</a>
                                            <a class="dropdown-item" href="#">50</a>
                                        </div>
                                    </div>
                                    <div class="ag-btns d-flex flex-wrap">

                                        <div class="btn btn-white  waves-effect waves-light">
                                            <a href="javascript:void(0)" id="addStaff">
                                                <i class="feather icon-plus"></i>
                                                <span class="menu-title">Add new</span>
                                            </a>
                                        </div>

                                        <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0"
                                               id="filter-text-box"
                                               placeholder="Search...."/>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="myGrid" class="aggrid ag-theme-material"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ag Grid users list section end -->
    </section>
    <!-- users list ends -->



    <section id="data-list-view" class="data-list-view-header">


        {{-- add new sidebar starts --}}
        <div class="add-new-staff-sidebar">
            <div class="overlay-bg"></div>
            <div class="add-new-staff">
                <form action="{{route('add-staff')}}" method="POST">
                    @csrf
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase cs-text-shadow-white">Add a new staff user</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <div class="data-items pb-2">
                        <div class="data-fields px-2 mt-4">

                            <div class="text-center mb-4">
                                <img src="{{asset('img/home/user_default.svg')}}" width="100px">
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="fname">{{ __('First Name') }}</label>
                                    <input id="fname" type="text"
                                           class="text-capitalize form-control @error('fname') is-invalid @enderror" name="fname"
                                           value="{{ old('fname') }}" required autocomplete="fname" autofocus placeholder="First name of staff">

                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label for="lname">{{ __('Last Name') }}</label>
                                    <input id="lname" type="text"
                                           class="text-capitalize form-control @error('lname') is-invalid @enderror" name="lname"
                                           value="{{ old('lname') }}" required autocomplete="lname" placeholder="last name of staff">

                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="text-lowercase col form-group">
                                        <label for="email"
                                               class="">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required
                                               autocomplete="email" placeholder="e.g. example@gmail.com">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="phone"
                                               class="">{{ __('Phone Number') }}</label>

                                        <input id="phone" type="tel"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone') }}" required
                                               autocomplete="phone" placeholder="e.g. 254700000000">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- form-row end.// -->

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="password" class="">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" data-validation-required-message="This field is required" placeholder="Enter password" required autocomplete="new-password" pattern="[A-Za-z][A-Za-z+0-9]{6}[A-Za-z+0-9]*[0-9][A-Za-z+0-9]*" title="Should cointain letters(Both upper &amp; lower case) numbers and no special characters and atleast more than 6 characters">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="password-confirm"
                                               class="">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control" placeholder="Repeat password"
                                               name="password_confirmation" required data-validation-match-match="password"  data-validation-required-message="Repeat password must match" autocomplete="new-password" pattern="[A-Za-z][A-Za-z+0-9]{6}[A-Za-z+0-9]*[0-9][A-Za-z+0-9]*" title="Should cointain letters(Both upper &amp; lower case) numbers and no special characters and atleast more than 6 characters">
                                    </div>
                                </div>


                                <div class="form-group px-2 mt-2 w-100">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Complete
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{-- add new sidebar ends --}}

    </section>

    <section class="cs-hidden">
        <!----urls to javascript---------->
        <a href="{{route('fetch-staffs')}}" id="urlFetchStaffs"></a>
    </section>
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/pages/app-user.js') }}"></script>


@endsection

@section('myscript')

    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{ asset('js/scripts/ui/sidebar-addstaff.js')}}"></script>
@endsection
