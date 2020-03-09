@extends('layouts/contentLayoutMaster')
@section('title','Staffs Management')

@section('vendor-style')
    {{-- Page css files --}}
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">

@endsection

@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection


@section('content')
    <!-- Header -->
    {{--
    <div class="header pb-6 pt-3 pt-lg-6 d-flex align-items-center auto-sliding-bg"
         style="min-height: 300px; background-image: url({{asset('img/theme/staffmgt.png')}}); background-size: cover; background-position: center top;">

        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <i class="fas fa-user-edit fa-5x cs-text-shadow text-white"></i>
                    <h1 class="display-2 text-black cs-text-shadow-white">Manage Organisation Users</h1>
                    <p class="text-black cs-text-shadow-white mt-0 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet assumenda autem consequuntur dicta ducimus eum itaque modi, nobis obcaecati velit!
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="position: absolute;right: 0;bottom: -24px">
            <div class="d-flex bg-white cs-card p-1 ">
                <img src="/storage/{{$organisation->image??'organisation/logo/org_default.svg'}}"
                     class="w-100" style="max-width: 64px">
                <h2 class="pl-2 text-dark cs-text-shadow-white" style="font-size: 36px;font-weight: 500">
                    {{$organisation->name}}</h2>
            </div>
        </div>
    </div>
    --}}



    <div class="row" style="margin: 64px 1px"></div>
    <div class="container-fluid mt--7 mb-5">
        <div class="row">
            <div class="col-sm-3 mb-5 mb-xl-0 p-0" style="background-color: rgba(44,153,255,0.65);color: white">
                <div class="d-flex justify-content-between align-items-baseline mt-2 mb-3" style="width: 100%">
                    <div class="d-flex ">
                        <span style="font-size: 24px;"
                              class="cs-text-shadow pl-1">Staffs ({{$usersOfOrg->count()-1}})</span>
                    </div>
                    <button type="button" class="rounded-circle btn-primary mr-1" href="#inlineForm" data-toggle="modal"
                            style="width: 32px!important;height: 32px!important;"><i class="fas fa-plus"></i></button>

                </div>

                <ul class="nav nav-tabs nav-left flex-column users-list" role="tablist"
                    style="padding: 0!important;">
                    <div style="display: none;">{{$i=0}}</div>

                    @foreach($usersOfOrg as $usr)
                        @if($usr->id==$user->id)

                            @continue
                        @endif
                        <div style="display: none;">{{$i++}}</div>
                        <li class="nav-item  ">
                            <a class="nav-link @if($i==1) active @endif d-flex"
                               id="baseVerticalLeft-tab{{$i}}" data-toggle="tab"
                               aria-controls="tabVerticalLeft{{$i}}" href="#tabVerticalLeft{{$i}}"
                               role="tab"
                               aria-selected="@if($i==1) true @else false @endif">
                                <img alt=""
                                     src="{{asset(config('app.file_path').($usr->image??'user/profiles/user_default.svg'))}}"
                                     style="border-radius: 50%;width: 40px;height: 40px;">
                                <p class="pt-1 pl-2 cs-text-shadow-white"
                                   style="color: #2c99ff;font-size: 20px;font-weight: lighter">{{$usr->name}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-sm-9 card" style="border-radius: 0">
                <section id="nav-filled tab" class="tab-content">
                    <div style="display: none;">{{$i=0}}</div>
                    @if($usersOfOrg->count()<=1)Update Roles

                    <div class="text-center pt-2" style="color: #4285f4;font-size: 24px">
                        You haven't added any staffs yet
                    </div>
                    @endif
                    @foreach($usersOfOrg as $usr)
                        @if($usr->id==$user->id)
                            @continue
                        @endif
                        <div style="display: none;">{{$i++}}</div>
                        <div class="p-4">
                            <form method="get" action=""
                                  class="form-horizontal" name="form-edit-staff">
                                @csrf

                                <input class="cs-hidden" name="userid" type="text" value="{{$usr->id}}">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <img alt="Image placeholder"
                                             src="{{asset('img\home\user_default.svg')}}"
                                             class="w-100"
                                             style="border-radius: 50%;max-width: 150px">


                                    </div>
                                    <div class="col-sm-9 pt-1">
                                        <input type="name" class="form-control"
                                               id="name"
                                               placeholder="Fullname"
                                               style="font-size: 28px;font-weight: 500;color: rgb(86,86,86);"
                                               value="{{$usr->name}}">

                                        <textarea class="form-control mt-1"
                                                  id="basicTextarea" rows="3"
                                                  placeholder="Staff Description"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row mb-2"
                                     style="margin-bottom: 0">
                                    <label class="control-label col-sm-3 text-right"
                                           for="email">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control"
                                               id="email"
                                               placeholder="Mobile" value="{{$user->phone}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-2"
                                     style="margin-bottom: 0">
                                    <label class="control-label col-sm-3 text-right"
                                           for="email"
                                    >Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control"
                                               id="email"
                                               value="{{$usr->email}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="control-label col-sm-3 text-right"
                                           for="email">CC Emails To</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control"
                                               id="email"
                                               placeholder="Enter email" list="emailsCC">
                                        <datalist id="emailsCC">
                                            @foreach(\App\User::where("organisation_id",$user->organisation_id)->get() as $list)
                                                <option value="{{$list['email']}}">
                                            @endforeach
                                        </datalist>

                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 text-right"
                                    >Staff Login Page</label>
                                    <div class="col-sm-9">
                                        <a href="#" class="text-blue">{{route('login')}}</a>
                                    </div>

                                </div>
                                <hr>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 text-right"
                                           for="email">Staff Login</label>
                                    <div class="col-sm-9">
                                        <div class="row mb-2 ">
                                            <div class="col-md-6">
                                                <div class="d-flex">
                                                    <div class="">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox"
                                                                   class="custom-control-input"
                                                                   id="customSwitch9" value="on" checked>
                                                            <label class="custom-control-label"
                                                                   for="customSwitch9">
                                                                <span class="switch-text-left">On</span>
                                                                <span class="switch-text-right">Off</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" pl-4">
                                                        Requires email
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3 pt-1">

                                                <p class="text-blue">Change Role</p>

                                            </div>

                                            <div class="col-md-6">
                                                <select class="form-control staff-input"
                                                        id="basicSelect" name="role_id">
                                                    <option @if($usr->role_id==4) selected @endif value="4">
                                                        Security Access
                                                    </option>
                                                    <option @if($usr->role_id==3) selected @endif value="3">
                                                        Reception Access
                                                    </option>
                                                    <option @if($usr->role_id==2) selected @endif value="2">
                                                        Admin Access
                                                    </option>

                                                    @can('for-superAdmin', $user)
                                                        <option @if($usr->role_id==1) selected @endif value="1">
                                                            SuperAdmin Access
                                                        </option>
                                                    @endCan

                                                </select>


                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox"
                                                                   class="custom-control-input"
                                                                   id="customSwitch10">
                                                            <label class="custom-control-label"
                                                                   for="customSwitch10">
                                                                <span class="switch-text-left">On</span>
                                                                <span class="switch-text-right">Off</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 pl-4">
                                                        Allow staff to update breaks
                                                        and hours
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel33">Add a new user for this organisation </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('add-staff')}}">
                    @csrf
                    <div class="modal-body">
                        <h5 class="brand-red pb-2 pt-2 text-underline"><u>Enter person details</u></h5>
                        <div class="form-row">

                            <div class="col form-group">
                                <label for="name">{{ __('Fullname') }}</label>
                                <input type="text" name="name"
                                       placeholder="" id="name"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       value="{{ old('name') }}" autocomplete="name" required>
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" autocomplete="email"
                                       required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                @endif
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                </span>
                            @enderror
                        </div>

                        <hr>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Complete Registration
                            </button>
                        </div> <!-- form-group// -->
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset('custom/argon/js/argon-dashboard.min.js?v=1.1.1')}}"></script>
    <script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

@endsection
@section('myscript')

    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>

    <script>
        var form = document.forms['form-edit-staff'];

        $(".staff-input").change(function () {

            $.get('staffs/update?' + this.name + '=' + this.value + "&id=" + form['userid'].value, function (data, status) {
                Swal.fire({
                    title: 'Staff role updated',
                    animation: false,
                    customClass: 'animated flipInX',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                }
            );
        });
    </script>
@endsection




























