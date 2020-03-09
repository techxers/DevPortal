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
                                <h5 class="card-title text-uppercase text-muted mb-0">Walk ins</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Visitor::where([['organisation_id','=',$organisation->id],['visitor_state','=', 2]])->get()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <img src="<?php echo e(asset("img/walk_in.svg")); ?>" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1004) ])); ?>">
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Walk outs</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Visitor::where([['organisation_id','=',$organisation->id],['visitor_state','=', 3]])->get()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <img src="<?php echo e(asset("img/walk_out.svg")); ?>" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1005) ])); ?>">
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Expected</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e(\App\Visitor::where([['organisation_id','=',$organisation->id],['visitor_state','=', 1]])->get()->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <img src="<?php echo e(asset("img/expected.svg")); ?>" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1006) ])); ?>">
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Active Staffs</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo e($organisation->users->where("status",true)->count()."/".$organisation->users->count()); ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <img src="<?php echo e(asset("img/active.svg")); ?>" style="max-width: 48px" class="bg-transparent">
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route("view-staff")); ?>">
                            <button type="button" class="btn btn-info mr-1 mb-1 mt-2">View more</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $subs_get=\App\Subscription::where('organisation_id', $organisation->id)->get();
        ?>
        <div class="row header-cards mb-3">
            <div class="col-xl-3 col-lg-6">
                <a href="javascript:void(0)" class="card-link sideFunc">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">VSM Payment Status</h5>
                                    <span style="font-size: 12px">&laquo;
                                        <?php
                                            $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                            $datetime2 =new DateTime($subs_get[0]->subscribed_on);
                                            date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                            $interval = $datetime2->diff($datetime1);
                                            echo abs($interval->format('%R%a days'));
                                        ?>
                                        days remaining &raquo;</span>
                                </div>
                                <div class="text-center"><i class="fas fa-dollar fa-3x "></i></div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header justify-content-center">
                        <h3 class="card-title text-center cs-text-shadow-white text-blue" style="font-size: 24px">Visitor Retention </h3>
                        <a class="heading-elements-toggle"><i
                                    class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i
                                                class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action="expand"><i
                                                class="feather icon-maximize"></i></a></li>
                                <li><a data-action="reload"><i
                                                class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="client-retention-chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12">
                <div class="container" style="background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);">
                    <div class="justify-content-center pt-2 pb-2">
                        <h3 class=" text-center cs-text-shadow-white text-blue" style="font-size: 24px">
                            Subscriptions Details</h3>
                    </div>

                    <div class="row justify-content-center">
                        <?php $__currentLoopData = $subs_get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!($subs->is_active)): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <?php $__currentLoopData = explode("%",trim($subs->plans)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs_plans_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_numeric($subs_plans_id)): ?>
                                    <?php continue; ?>
                                <?php endif; ?>
                                <?php
                                    $plans=\App\Plan::find($subs_plans_id);
                                ?>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><?php echo e($plans->product->title." (".$plans->title.")"); ?> </h4>
                                            <a class="heading-elements-toggle"><i
                                                        class="fa fa-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i
                                                                    class="feather icon-chevron-down"></i></a></li>
                                                    <li><a data-action="expand"><i
                                                                    class="feather icon-maximize"></i></a></li>
                                                    <li><a data-action="reload"><i
                                                                    class="feather icon-rotate-cw"></i></a></li>
                                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="text-capitalize text-muted">
                                                                Price: <?php echo e($plans->pricing); ?>

                                                                /<?php echo e($plans->period); ?></h6>
                                                            <h6>Paid: <?php echo e($subs->amount_paid); ?></h6>
                                                        </div>
                                                        <div class="mt-1">
                                                            <h6>Date Subscribed: <span
                                                                        class="text-muted"><?php echo e(date_format(date_create($subs->subscribed_on),'l jS F Y')); ?></span>
                                                            </h6>
                                                        </div>
                                                        <div class="mt-1">
                                                            <h6>Time Left: <span class="text-muted"
                                                                                 style="font-size: 20px">
                                                        <?php
                                                            $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                                            $datetime2 =new DateTime($subs->subscribed_on);
                                                            date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                                            $interval = $datetime2->diff($datetime1);
                                                            echo abs($interval->format('%R%a days'));
                                                        ?>

                                                    </span> days</h6>
                                                        </div>
                                                        <div class="table-responsive mt-1">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr class="text-center">
                                                                    <th style="font-size: 16px; text-transform: capitalize!important;font-weight: 200">
                                                                        Features Available
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php $__currentLoopData = explode(';',$plans->functionality); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $func): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(strlen($func)<1): ?>
                                                                        <?php continue; ?>;
                                                                    <?php endif; ?>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <?php echo e($func); ?> <i class="feather icon-check"></i>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </div>
<br><br><br>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('vendors/js/charts/apexcharts.min.js')); ?>"></script>

    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/pages/dashboard-ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>

    <script>
        /***********************dealing with product selection**********************/
        var productsPlans = document.getElementsByClassName('productPlans');
        var products = document.getElementsByClassName('productSelect');
        var formReference = document.forms["registerForm"];
        var total = 0;
        for (var x = 0; x < productsPlans.length; x++) {
            productsPlans[x].style.display = "none";
        }
        $(".productSelect").change(function () {
            for (var x = 0; x < products.length; x++) {
                if (products[x].checked) {
                    productsPlans[x].style.display = "block";

                } else {
                    productsPlans[x].style.display = "none";
                }
            }
            calculateTotal();
        });
        $(".plan_select").change(function () {
            calculateTotal();
        });

        function calculateTotal() {
            total = 0;
            for (var x = 0; x < products.length; x++) {
                if (products[x].checked)
                    total += parseInt(formReference['plan_product' + x].value.split("=")[1]);
            }
            document.getElementById("totalPayment").innerHTML = total;
            formReference['regTotalPayee'].value=total;
            collectProducts();
        }

        function collectProducts() {
            var outProducts="", outPlans="";
            for (var x = 0; x < products.length; x++) {
                if (products[x].checked) {
                    outProducts += products[x].value + "%";
                    outPlans += formReference['plan_product' + x].value.split("=")[0]+"%";
                }
            }
            formReference['regProducts'].value=outProducts;
            formReference['regPlans'].value=outPlans;
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/dashboard-admin.blade.php ENDPATH**/ ?>