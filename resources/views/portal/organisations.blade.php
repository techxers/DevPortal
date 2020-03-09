@extends('layouts/contentLayoutMaster')

@section('title', 'List View')

@section('vendor-style')
    {{-- vednor files --}}
    <link href="{{asset('custom/argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
@section('mystyle')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">

@endsection

@section('content')
    {{-- Data list view starts --}}
    <section id="data-list-view" class="data-list-view-header">
        @if (session('registered'))
            <div class="alert alert-success" role="alert">
                {{ session('registered') }}
            </div>
            <script>
                Swal.fire({
                    title: "Organisation Registered!",
                    text: "{{ session('registered') }}",
                    type: "success",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            </script>
        @endif
        <div class="action-btns d-nonex">Shows all the organisations registered</div>
        {{--
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light pr-3"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another Action</a>
                    </div>
                </div>
            </div>
        </div>
        --}}

        {{-- DataTable starts --}}
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                <tr>
                    <th>Logo/Organisation</th>
                    <th class="text-uppercase">Status</th>
                    <th class="text-uppercase">Contact</th>

                    <th class="text-uppercase">Users</th>

                    <th class="text-uppercase">Industry/Type</th>
                    <th class="text-uppercase">Address</th>
                    <th class="text-uppercase">Activity</th>
                    <th class="text-uppercase"></th>
                </tr>
                </thead>
                <tbody>
                <div style="display: none">{{$count=1}}
                </div>

                @foreach($organisations as $ogt)
                    @if($ogt->id==1)
                        @continue
                    @endif

                    <tr>

                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                    <img alt="Image placeholder"
                                         src="{{asset(config('app.file_path').($ogt->image??'organisation/logo/org_default.svg'))}}">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$ogt->name}}</span>
                                </div>
                            </div>
                        </th>

                        <td>
                            <div style="display: none">{{$count++}}</div>
                            @if($ogt->subscript_status>1)
                                <div class="chip chip-success mr-1">
                                    <div class="chip-body">
                                        <span class="chip-text">Settled</span>
                                    </div>
                                </div>
                            @elseif($ogt->subscript_status==1)
                                <div class="chip chip-warning mr-1">
                                    <div class="chip-body">
                                        <span class="chip-text">Almost</span>
                                    </div>
                                </div>
                            @else
                                <div class="chip chip-danger mr-1">
                                    <div class="chip-body">

                                        <span class="chip-text">Expired</span>

                                    </div>
                                </div>

                            @endif


                        </td>
                        <td>

                            <div class="dropdown">
                                <a class="btn-sm btn-icon-only text-light" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-address-book fa-2x text-info"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="p-2">
                                        <li class="dropdown-item"> Phone : <a
                                                    href="tel:{{$ogt->phone}}">{{$ogt->phone}}</a></li>
                                        <li class="dropdown-item"> Email : <a
                                                    href="mailto: {{$ogt->email}}"> {{$ogt->email}}</a></li>
                                        <li class="dropdown-item"> Postal Address : {{$ogt->postcode}}</li>
                                        <li class="dropdown-item"> Website : <a href="{{substr($ogt->website,0,10)}}">Open
                                                Website</a></li>
                                    </ul>
                                </div>

                            </div>


                        </td>

                        <td>
                            <div class="avatar-group">
                                @php
                                    $c=0;
                                @endphp

                                @foreach($ogt->users as $orgUser)
                                    @php
                                        $c++
                                    @endphp

                                    @if($c>5)
                                        @break;
                                    @endif
                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                       data-original-title="{{$orgUser->name}}">
                                        <img src="{{asset(config('app.file_path').($orgUser->image??'user/profiles/user_default.svg'))}}"
                                             class="rounded-circle" alt=""
                                             @if($orgUser->role_id<3) style="width: 36px;height: 36px" @endif>
                                    </a>

                                @endforeach
                            </div>
                        </td>


                        <td>
                            <div class="small">
                                {{$ogt->industry}}
                            </div>
                            <span class="small">{{$ogt->type}}</span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn-sm btn-icon-only text-light" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-map-pin fa-2x text-info"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="p-2">
                                        <li class="dropdown-item"> Based
                                            in {{$ogt->city.', '.$ogt->country}}</li>
                                        <li class="dropdown-item">Postal Address : {{$ogt->postcode}}</li>
                                    </ul>
                                </div>

                            </div>
                        </td>

                        <td>
                            <div style="display: none;">
                                {{
                            $randomAct=random_int(10,100)
                            }}
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="mr-2">{{$randomAct}}%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar
                                                                @if ($randomAct>=80)
                                                bg-success
@elseif($randomAct>=60)
                                                bg-info
@elseif($randomAct>=40)
                                                bg-warning
@else
                                                bg-danger
@endif
                                                " role="progressbar"
                                             aria-valuenow="{{$randomAct}}" aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: {{$randomAct}}%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">

                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="javascript:void(0)"
                                       onclick="document.getElementById('showModal').style.display='block';pasteFormData('{{$ogt->id}}', '{{$ogt->name}}', '{{$ogt->email}}', '{{$ogt->phone}}', '{{$ogt->website}}', '{{$ogt->postcode}}', '{{$ogt->city}}','{{$ogt->country}}', '{{$ogt->industry}}')">Edit
                                        Data</a>
                                    <a class="dropdown-item" href="#">Send Notification</a>
                                    <a class="dropdown-item" href="#">Terminate</a>
                                </div>

                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- DataTable ends --}}


        <script>
            function pasteFormData(uuid, name, email, phone, website, postcode, city, country, industry) {
                const fm = document.forms["editForm"];
                fm['name'].value = name;
                fm['email'].value = email;
                fm['phone'].value = phone;
                fm['idContainer'].value = uuid;
                fm['website'].value = website;
                fm['postcode'].value = postcode;
                fm['city'].value = city;
                fm['country'].value = country;
                fm['industry'].value = industry;

                //  fm.action = 'organisations/update/' + uuid;
            }
        </script>

    </section>
    <div class="showModal" id="showModal">
        <div style="position: absolute;left: 0;right: 0;top: 0;bottom: 0;"
             onclick="document.getElementById('showModal').style.display='none'"></div>
        <div class="card rounded" style="margin-top:72px; overflow-y: scroll">
            <div class="card-header p-2">
                <h3 class="text-white cs-text-shadow">Edit Data for the organisation</h3>
                <button type="button" class="close cs-text-shadow pr-3 pt-2"
                        onclick="document.getElementById('showModal').style.display='none'">
                                                <span style="font-size: 64px"
                                                      class="text-white cs-text-shadow">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{route('update-organisations')}}" enctype="multipart/form-data"
                      method="post" name="editForm">
                    @csrf
                    <h6 class="heading-small text-muted">organisations Basic</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div style="display: none">
                                <input type="text" id="idContainer" name="idContainer"
                                       value="">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="name">Name</label>
                                    <input type="text" id="name" name="name"
                                           class="form-control form-control-alternative"
                                           placeholder="Name of the Organiz..."
                                           value="->name}}"
                                           required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email-address</label>
                                    <input type="email" id="email" name="email"
                                           class="form-control form-control-alternative"
                                           placeholder="company@example.com"
                                           value="->email}}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone"
                                           class="form-control form-control-alternative"
                                           placeholder="Phone number"
                                           value="->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="website">Website</label>
                                    <input type="text" id="website" name="website"
                                           class="form-control form-control-alternative"
                                           placeholder="Website" value="->website}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Address -->
                    <h6 class="heading-small text-muted">Contact information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="postcode">Postal
                                        Address</label>
                                    <input id="postcode" name="postcode"
                                           class="form-control form-control-alternative"
                                           placeholder="Postal address"
                                           value="->postcode}}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="city">City</label>
                                    <input type="text" id="city" name="city"
                                           class="form-control form-control-alternative"
                                           placeholder="City" value="->city}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="country">Country</label>
                                    <input type="text" id="country" name="country"
                                           class="form-control form-control-alternative"
                                           placeholder="Country" value="->country}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="industry">Industry</label>
                                    <input type="text" id="industry" name="industry"
                                           class="form-control form-control-alternative"
                                           placeholder="Industry dealings"
                                           value="->city}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="form-group pt-2">

                            <button type="submit"
                                    class="text-uppercase btn btn-primary btn-block"
                                    id="regBtn"> Save Edits
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Data list view end --}}
@endsection
@section('vendor-script')
    {{-- vednor js files --}}
    <script src="{{ asset('vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    {{--
    <script src="{{ asset('vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    --}}
@endsection
@section('myscript')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{ asset('js/scripts/popover/popover.js')}}"></script>
    <script src="{{ asset('js/scripts/extensions/sweet-alerts.js') }}"></script>
@endsection
