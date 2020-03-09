<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/vendors/css/charts/apexcharts.css')); ?>">
    <link href="<?php echo e(asset('css/custom/argon-dashboard/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('css/nt-styles.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/css/pages/dashboard-ecommerce.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('at/css/pages/card-analytics.css')); ?>">
    <style>
        .dashboard-bg{
            position: absolute;
            left: 0;
            right: 0;
            min-height: 500px;
            background-image: url(<?php echo e(asset('img/theme/summary2bg.png')); ?>);
            background-size: contain; background-position: center top;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('at/css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="dashboard-analytics">
        <div class="dashboard-bg"
             style=""></div>
        <div style="padding-top:128px"></div>
        <div class="row header-cards mb-3">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Visitors</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Visitor::where('organisation_id', $organisation->id)->get()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('view-visitors',$organisation)); ?>">
                            <button type="button" class="btn btn-danger mr-1 mb-1 mt-2">View more</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Today's Appointments</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Appointment::all()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-business-time"></i>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)">
                            <button type="button" class="btn btn-warning mr-1 mb-1 mt-2">View Details</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Staffs</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e($organisation->users->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('org-staff')); ?>">
                            <button type="button" class="btn bg-yellow mr-1 mb-1 mt-2 text-white">View more</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Schedules</h5>
                                <span class="h2 font-weight-bold mb-0">4</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)">
                            <button type="button" class="btn btn-info mr-1 mb-1 mt-2">View more</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row header-cards mb-3">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Manage Appointments</h5>
                                <span>&laquo; &raquo;</span>
                            </div>
                            <div class="text-center"><i class="fas fa-plus fa-3x text-blue cs-text-shadow"></i> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">Visitor Retention</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="client-retention-chart">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">Tasks: TODO</h3>
                            <p class="card-text">This are just the task forwarded to the admin for review</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-primary float-right "><i class="feather icon-check"></i> </span>
                                Services are taking too long
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-primary float-right "><i class="feather icon-cancel"></i> </span>
                                Webserver appears to be down
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-warning float-right"><i class="feather icon-cancel"></i></span>
                                Register a new user
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-success float-right"><i class="feather icon-check"></i></span>
                               user 1 forgot password
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-danger float-right"><i class="feather icon-cancel"></i></span>
                                Vestibulum at eros
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-pill bg-success float-right"><i class="feather icon-cancel"></i></span>
                                Lorem ipsum dolor sit amet.
                            </li>
                        </ul>
                        <div class="card-body text-center" >
                            <a href="#" class="card-link">Add <i class="fas fa-plus fa-2x"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('at/vendors/js/charts/apexcharts.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('at/js/scripts/pages/dashboard-ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('at/js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/summary2.blade.php ENDPATH**/ ?>