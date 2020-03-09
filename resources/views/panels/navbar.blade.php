<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        @can('for-client', $user)
                            <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                                      href="{{route("dashboard")}}#todo"
                                                                      data-toggle="tooltip" data-placement="top"
                                                                      title="Todo"><i
                                            class="ficon feather icon-check-square"></i></a></li>
                        @endcan

                        <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                                  data-placement="top"
                                                                  title="Calendar" href="{{route('calendar-system')}}"
                            ><i
                                        class="ficon feather icon-calendar"></i></a></li>
                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">
                    {{--
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><i class="fas fa-list">
                            </i><span class="selected-language">Menu</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                                <a class="dropdown-item" href="{{route("dashboard")}}" data-language="en">
                                    <i class="fa fa-columns"></i> Dashboard
                                </a>
                            @can('for-superAdmin','$user')
                                <a class="dropdown-item" href="{{route('organisations')}}" data-language="fr">
                                    <i class="fa fa-business-time"></i> Organisations
                                </a>
                            @endcan
                                <a class="dropdown-item" href="{{route('visitors-view')}}" data-language="de">
                                    <i class="fa fa-users"></i> Visitors
                                </a>
                            @can('for-allAdmins','$user')
                                <a class="dropdown-item" href="{{route('reports')}}" data-language="pt">
                                    <i class="fa fa-folder"></i> Reports
                                </a>
                            @endcan
                        </div>
                    </li>
                    --}}
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon feather icon-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore your portal..." tabindex="-1"
                                   data-search="template-list">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                    @can('for-allAdmins', $user)
                        @php
                            $appointNotes=\App\Appointment::where([['organisation_id', $organisation->id],["status","pending"]])->get();

                        @endphp


                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                               data-toggle="dropdown"><i
                                        class="ficon feather icon-bell"></i>
                                @if($appointNotes->count()>0)<span
                                        class="badge badge-pill badge-primary badge-up">{{$appointNotes->count()}}</span>
                                @endif</a>

                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">{{$appointNotes->count()}} New</h3><span
                                                class="notification-title">Appointments This Week</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    @foreach($appointNotes as $appNote)


                                        <a class="d-flex justify-content-between"
                                           href="{{route('show-appointments')}}">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i
                                                            class="feather icon-calendar plus-square font-medium-5 primary"></i>
                                                </div>

                                                <div class="media-body">
                                                    <h6 class="primary media-heading">{{$appNote->visitor->first_name." ".$appNote->visitor->last_name}}</h6>
                                                    <small class="notification-text"> To
                                                        visit {{$appNote->visitor->host}}
                                                        at {{$appNote->visitor->office}} Office
                                                    </small>
                                                </div>

                                                <small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">
                                                        {{date_format(date_create($appNote->dateTime), 'l jS F')}}<br>
                                                        {{date_format(date_create($appNote->dateTime), 'g:i A')}}

                                                    </time>
                                                </small>
                                            </div>
                                        </a>


                                    @endforeach
                                </li>
                                @if($appointNotes->count()>0)
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                                                        href="{{route('show-appointments')}}">View all
                                            appointments</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endcan
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600">{{$user->name}}</span><span
                                        class="user-status text-blue">{{$role->name}}</span>
                            </div>
                            <span><img class="round"
                                       src="{{asset(config('app.file_path').($user->image??'user/profiles/user_default.svg'))}}"
                                       alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pr-2">
                            <a class="dropdown-item" href="{{route('organisation-profile')}}">
                                <i class="feather icon-user"></i> Account
                            </a>
                            @can('for-superAdmin', $user)
                                <a class="dropdown-item" href="{{route('settings')}}">
                                    <i class="feather icon-settings"></i> Settings
                                </a>
                                <a class="dropdown-item" href="{{route('billing-list')}}">
                                    <i class="feather icon-dollar-sign"></i> Billing
                                </a>
                            @endcan
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="feather icon-power"></i>Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->