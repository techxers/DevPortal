<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="">{{--$organisation->website??'#'--}}
                    <div class="brand-logo">
                        <img src="{{asset(config('app.file_path').($organisation->image??'organisation/logo/org_default.svg'))}}"
                             class="w-100 rounded-circle" style="max-width: 36px;padding:2px" width="36px" height="36px">
                    </div>
                    <h2 class="brand-text mb-0 text-capitalize" style="padding-left: 4px">
                        @if(strlen($organisation->name)<10)
                            {{$organisation->name}}
                        @else
                            {{substr($organisation->name,0,10)}}..
                        @endif
                    </h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc" style="position: absolute;right: 16px;margin-top: 4px"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main pb-1" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @php
                $menu='';
            @endphp

            @foreach($menuData->menu as $menu)

                @if(isset($menu->navheader))
                    @can($menu->policy, $user)
                        <li class="navigation-header">
                            <span class="text-blue">{{ $menu->navheader }}</span>
                        </li>
                    @endcan
                @else
                    {{-- Add Custom Class with nav-item --}}
                    @php
                        $custom_classes = "";
                        if(isset($menu->classlist)) {
                          $custom_classes = $menu->classlist;
                        }

                    @endphp

                    @can($menu->policy, $user)
                        <li class="nav-item {{ (request()->is('portal/'.$menu->url)) ? 'active' : '' }} {{ $custom_classes }} ">
                            <a href="@if(isset($menu->uri)){{route($menu->uri)}}@else{{'javascript:void(0)'}}@endif" id="@if(isset($menu->id)){{$menu->id}}@endif">
                                <i class="{{ $menu->icon }}"></i>
                                <span class="menu-title">{{ $menu->name }}</span>
                                @if (isset($menu->badge))
                                    <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                                    <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass.' test' : $badgeClasses.' notTest' }} ">{{$menu->badge}}</span>
                                @endif
                            </a>


                            @if(isset($menu->submenu))
                                @include('panels/submenu', ['menu' => $menu->submenu])
                            @endif

                        </li>
                    @endcan
                @endif
            @endforeach
            {{-- Foreach menu item ends --}}
        </ul>
        <div class="pt-1 text-center">
            <a href="javascript:void(0);" class="text-blue cs-text-shadow-white " style="font-size: 16px;opacity: .5">
                &copy; NeutronIT
            </a>
        </div>
        {{--

          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              <li class="nav-item active"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i>
                      <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                      <span class="badge badge badge-primary badge-pill float-right mr-2">
                          {{substr(explode(' ',trim($organisation->name))[0],0,1)}}
                      </span></a>
              </li>

              @can('for-superAdmin', $user)
                  <li class=" navigation-header text-blue"><span>Organisations</span>
                  </li>
                  <li class=" nav-item"><a href="{{route('organisations')}}"><i class="feather icon-eye"></i><span
                                  class="menu-title"
                                  data-i18n="view-org">View All</span></a>
                  </li>
                  <li class=" nav-item"><a href="#" id="sidd"><i class="feather icon-plus"></i><span
                                  class="menu-title" data-i18n="add-org">Add New</span></a>
                  </li>
                  <li class=" nav-item"><a href="#"><i class="feather icon-xxx"></i><span class="menu-title"
                                                                                          data-i18n="Ecommerce">Manage</span></a>
                      <ul class="menu-content">
                          <li><a href="javascript:void(0)"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                         data-i18n="Shop">Module 1</span></a>
                          </li>
                          <li><a href="javascript:void(0)"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Shop">Module 2</span></a>
                          </li>
                          <li><a href="javascript:void(0)"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Shop">Module 3</span></a>
                      </ul>
                  </li>
              @endif
              <li class=" navigation-header text-blue"><span>Specific</span>
              </li>
              <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title"
                                                                                        data-i18n="Data List">Visitors Mgt</span></a>
                  <ul class="menu-content">
                      <li><a href="{{route('view-visitors',$organisation)}}"><i class="feather icon-circle"></i><span
                                      class="menu-item"
                                      data-i18n="List View">View</span></a>
                      </li>
                      @can('for-superAdmin', $user)
                          <li><a href="{{route('all-visitors')}}"><i class="feather icon-circle"></i><span
                                          class="menu-item"
                                          data-i18n="List View">View All</span></a>
                          </li>
                      @endcan

                      @can('for-client', $user)
                          <li><a href="{{route('vis-register')}}"><i class="feather icon-circle"></i><span
                                          class="menu-item"
                                          data-i18n="List View">Add  </span></a>
                          </li>
                      @endcan

                  </ul>
              </li>
              <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title"
                                                                                            data-i18n="Content">My Organisation</span></a>
                  <ul class="menu-content">
                      @can('for-allAdmins', $user)
                          <li><a href="{{route("org-staff")}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                        data-i18n="Grid">Staff Management</span></a>
                          </li>
                      @endcan
                      <li><a href="{{route("org-profile")}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Grid">View Profile</span></a>
                      </li>
                      @can('for-allAdmins', $user)
                          <li><a href="{{route("org-log")}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Grid">Usage(Logs)</span></a>
                          </li>
                      @endcan
                  </ul>
              </li>
              <li class=" navigation-header text-blue"><span>pages</span>
              </li>
              <li class=" nav-item">
                  <a href="{{route('user-profile')}}">
                      <i class="feather icon-user"></i>
                      <span class="menu-title" data-i18n="Profile">Profile</span>
                  </a>
              </li>
              <li class=" nav-item">
                  <a href="{{route('visitors-reports')}}">
                      <i class="feather icon-book"></i>
                      <span class="menu-title" data-i18n="Reports">Reports</span>
                  </a>
              </li>


              <li class=" nav-item"><a href="javascript:void(0)"><i class="feather icon-help-circle"></i><span
                              class="menu-title" data-i18n="FAQ">FAQ</span></a>
              </li>

              </li>
              <li class=" navigation-header text-blue"><span>Support</span>
              </li>
              <li class=" nav-item"><a
                          href="javascript:void(0)"><i
                              class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Support Desk</span></a>
              </li>
              <li class=" nav-item"><a href="javascript:void(0)"><i class="feather icon-copyright"></i><span
                              class="menu-title" data-i18n="Raise Support">&copy; Neutron Technology</span></a>
              </li>
          </ul>
        --}}
    </div>
</div>
<!-- END: Main Menu-->