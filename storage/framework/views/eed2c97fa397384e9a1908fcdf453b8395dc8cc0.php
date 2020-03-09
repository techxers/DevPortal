<body class="vertical-layout vertical-menu-modern <?php echo e($user->config->theme); ?> 2-columns  navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">




<?php echo $__env->make('panels.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    
    <?php echo $__env->make('panels.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content-wrapper">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-superAdmin', $user)): ?>
            <?php echo $__env->make('panels/sidebar-register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-admin', $user)): ?>
            <?php echo $__env->make('panels/sidebar-subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>


        <div class="content-header row">

        </div>
        <div class="content-body">
            
            <?php echo $__env->yieldContent('content'); ?>
            
        </div>
    </div>

</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<?php echo $__env->make('panels/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('panels/scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<?php echo $__env->yieldContent('myscript'); ?>


</body>
</html>
<?php /**PATH C:\Techxers\Neutron\resources\views/layouts/verticalLayoutMaster.blade.php ENDPATH**/ ?>