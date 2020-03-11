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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-client', $user)): ?>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                                      href="<?php echo e(route("dashboard")); ?>#todo"
                                                                      data-toggle="tooltip" data-placement="top"
                                                                      title="Todo"><i
                                            class="ficon feather icon-check-square"></i></a></li>
                        <?php endif; ?>

                        <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                                                  data-placement="top"
                                                                  title="Calendar" href="<?php echo e(route('calendar-system')); ?>"
                            ><i
                                        class="ficon feather icon-calendar"></i></a></li>
                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">
                    
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-allAdmins', $user)): ?>
                        <?php
                            $appointNotes=\App\Appointment::where([['organisation_id', $organisation->id],["status","pending"]])->get();

                        ?>


                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                               data-toggle="dropdown"><i
                                        class="ficon feather icon-bell"></i>
                                <?php if($appointNotes->count()>0): ?><span
                                        class="badge badge-pill badge-primary badge-up"><?php echo e($appointNotes->count()); ?></span>
                                <?php endif; ?></a>

                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><?php echo e($appointNotes->count()); ?> New</h3><span
                                                class="notification-title">Appointments This Week</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    <?php $__currentLoopData = $appointNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                        <a class="d-flex justify-content-between"
                                           href="<?php echo e(route('show-appointments')); ?>">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i
                                                            class="feather icon-calendar plus-square font-medium-5 primary"></i>
                                                </div>

                                                <div class="media-body">
                                                    <h6 class="primary media-heading"><?php echo e($appNote->visitor->first_name." ".$appNote->visitor->last_name); ?></h6>
                                                    <small class="notification-text"> To
                                                        visit <?php echo e($appNote->visitor->host); ?>

                                                        at <?php echo e($appNote->visitor->office); ?> Office
                                                    </small>
                                                </div>

                                                <small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">
                                                        <?php echo e(date_format(date_create($appNote->dateTime), 'l jS F')); ?><br>
                                                        <?php echo e(date_format(date_create($appNote->dateTime), 'g:i A')); ?>


                                                    </time>
                                                </small>
                                            </div>
                                        </a>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </li>
                                <?php if($appointNotes->count()>0): ?>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                                                        href="<?php echo e(route('show-appointments')); ?>">View all
                                            appointments</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600"><?php echo e($user->name); ?></span><span
                                        class="user-status text-blue"></span>
                            </div>
                            <span><img class="round"
                                       src="<?php echo e(asset(config('app.file_path').($user->image??'user/profiles/user_default.svg'))); ?>"
                                       alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pr-2">
                            <a class="dropdown-item" href="<?php echo e(route('organisation-profile')); ?>">
                                <i class="feather icon-user"></i> Account
                            </a>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-superAdmin', $user)): ?>
                                <a class="dropdown-item" href="<?php echo e(route('settings')); ?>">
                                    <i class="feather icon-settings"></i> Settings
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('billing-list')); ?>">
                                    <i class="feather icon-dollar-sign"></i> Billing
                                </a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="feather icon-power"></i>Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                  style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header--><?php /**PATH C:\wamp64\www\code\DevPortal\resources\views/panels/navbar.blade.php ENDPATH**/ ?>