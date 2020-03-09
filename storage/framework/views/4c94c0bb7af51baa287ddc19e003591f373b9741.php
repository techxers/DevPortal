<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/charts/apexcharts.css')); ?>">
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('custom/nt-styles.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/dashboard-ecommerce.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/card-analytics.css')); ?>">
    <style>
        .dashboard-bg {
            position: absolute;
            left: 0;
            right: 0;
            min-height: 500px;
            background-image: url(<?php echo e(asset('img/theme/summary2bg.png')); ?>);
            background-size: contain;
            background-position: center top;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">


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
                        <a href="<?php echo e(route('visitors-view')); ?>">
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
                        <a href="<?php echo e(route('view-staff')); ?>">
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
                            <div class="text-center"><i class="fas fa-plus fa-3x text-blue cs-text-shadow"></i></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">
                            Visitor Retention</h3>
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
                <div class="card ">
                    <?php
                        $visitors = \App\Visitor::where('organisation_id', $organisation->id)->get();
                        $appointments=\App\Appointment::where('organisation_id', $organisation->id)->get();

              $subs=\App\Subscription::where('organisation_id', $organisation->id)->get()->first();

                    ?>
                    <div class="card-header text-center">
                        <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">
                            <?php echo e($subs->service->title); ?>

                        </h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center">

                            <p class="card-text">You purchased this service at a price of
                                <b>Kshs. <?php echo e($subs->subscription_amount); ?></b>
                            </p>
                            <p class="">Time Remaining for next payment <br><span style="font-size: 24px">

                                    <?php
                                        $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                        $datetime2 =new DateTime($subs->subscribed_on);
                                        date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                        $interval = $datetime2->diff($datetime1);
                                        echo abs($interval->format('%R%a days'));
                                    ?>
                                </span> days
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">

                            <?php $__currentLoopData = explode(";",$subs->service->details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="list-group-item">
                                    <span class="badge badge-pill  float-right"><i
                                                class="feather icon-check"></i> </span>
                                    <?php echo e($sr); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="card-body">
                            <a href="javascript:void(0)"  class="card-link"  id="sidd">Pay Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title cs-heading" id="myModalLabel33">Add a Todo </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('add-todo')); ?>" method="post">
                            <?php echo csrf_field(); ?>;
                            <div class="modal-body">
                                <label>Date </label>
                                <div class="form-group">
                                    <input type="date" name="date" placeholder="todo date" class="form-control"
                                           required>
                                </div>

                                <label for="cal-description">Description</label>
                                <div class="form-group">
                                     <textarea class="form-control" id="cal-description" rows="5"
                                               placeholder="Description" name="description" required></textarea>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-dismixss="modal">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/dashboard-admin.blade.php ENDPATH**/ ?>