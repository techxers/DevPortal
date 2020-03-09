<?php $__env->startSection('title', 'SuperAdmin Dashboard'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/charts/apexcharts.css')); ?>">
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/dashboard-ecommerce.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/card-analytics.css')); ?>">
    <style>
        .dashboard-bg {
            background-image: url(<?php echo e(asset('img/theme/summary1bg.png')); ?>);
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="dashboard-ecommerce" class="">

        <div class="dashboard-bg"
             style=""></div>
        <div style="padding-top:128px"></div>
        <div class="row header-cards mb-3 ">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">organisations</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Organisation::all()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-building" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total users</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\User::all()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                            <span class="text-nowrap">Since last week</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Av. Visitors</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Visitor::all()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                            <span class="text-nowrap">Since yesterday</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Subscriptions</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(round((\App\Organisation::where('subscript_status','>',0)->count()/\App\Organisation::all()->count())*100,1)); ?>%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h3 class="mb-0 text-center text-blue cs-text-shadow-white" style="font-size: 20px">VMS
                            Subscription</h3>
                        <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i>
                        </p>
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-start">
                                <div class="mr-2">
                                    <p class="mb-50 text-bold-600">This Month</p>
                                    <h2 class="text-bold-400">
                                        <sup class="font-medium-1">u</sup>
                                        <span class="text-success">20</span>
                                    </h2>
                                </div>
                                <div>
                                    <p class="mb-50 text-bold-600">Last Month</p>
                                    <h2 class="text-bold-400">
                                        <sup class="font-medium-1">u</sup>
                                        <span>14</span>
                                    </h2>
                                </div>

                            </div>
                            <div id="revenue-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h3 class="mb-0 text-center text-blue cs-text-shadow-white" style="font-size: 20px">System
                            Usage</h3>
                        <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i>
                        </p>
                    </div>
                    <div class="card-content">
                        <div class="card-body px-0 pb-0">
                            <div id="goal-overview-chart" class="mt-75"></div>
                            <div class="row text-center mx-0">
                                <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                    <p class="mb-50">Active</p>
                                    <p class="font-large-1 text-bold-700">8</p>
                                </div>
                                <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                    <p class="mb-50">Out of</p>
                                    <p class="font-large-1 text-bold-700">11</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(asset(route('organisations'))); ?>">
            <div class="row mt-3">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0 cs-text-shadow-white pb-3" style="font-size: 24px;color: #4285f4">
                                Organisations Summary</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Organisation</th>
                                    <th scope="col">Subscription Period</th>
                                    <th scope="col">Total Users</th>
                                    <th scope="col">Activity</th>
                                </tr>
                                </thead>
                                <tbody>

                                <div style="display: none"><?php echo e($count=0); ?></div>
                                <?php $__currentLoopData = \App\Organisation::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ogt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div style="display: none"><?php echo e($count++); ?></div>
                                    <?php if($count>3): ?>
                                        <?php break; ?>
                                    <?php endif; ?>

                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder"
                                                         src="<?php echo e(asset(config('app.file_path').($ogt->image??'organisation/logo/org_default.svg'))); ?>">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo e($ogt->name); ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <?php echo e(array("6 Months","1 Year","2 Years")[random_int(0,2)]); ?>

                                        </td>
                                        <td>
                                            <h3 class="text-black cs-text-shadow-white"> <?php echo e($ogt->users->count()); ?></h3>
                                        </td>
                                        <td>
                                            <div style="display: none;">
                                                <?php echo e($randomAct=random_int(10,100)); ?>

                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2"><?php echo e($randomAct); ?>%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar
                                                                <?php if($randomAct>=80): ?>
                                                                bg-success
<?php elseif($randomAct>=60): ?>
                                                                bg-info
<?php elseif($randomAct>=40): ?>
                                                                bg-warning
<?php else: ?>
                                                                bg-danger
<?php endif; ?>
                                                                " role="progressbar"
                                                             aria-valuenow="<?php echo e($randomAct); ?>" aria-valuemin="0"
                                                             aria-valuemax="100"
                                                             style="width: <?php echo e($randomAct); ?>%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('vendors/js/charts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/pages/dashboard-ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/dashboard-superAdmin.blade.php ENDPATH**/ ?>