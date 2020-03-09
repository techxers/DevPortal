<?php $__env->startSection('title', 'Reactivate Account'); ?>

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
    <section>

        <div class="pt-2 pb-2">
            <h1 class="text-red">The Account for this organisation has been blocked</h1>
            <br>
            <h5>Contact your following administrators to reactivate account</h5>

            <ul>
            <?php $__currentLoopData = $organisation->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($admin->role_id<3): ?>
                <li class="pt-1">Admin: <span class="small"><?php echo e($admin->name); ?></span></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

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

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/account-blocked.blade.php ENDPATH**/ ?>