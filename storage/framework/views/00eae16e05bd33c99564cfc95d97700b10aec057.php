<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="description"
          content="NeutronIT is a team of innovative and creative professionals who understand the need of customer focused solutions. With our experience you can trust us to provide you with high quality and secure software solutions.">
    <meta name="keywords" content="vsm kenya, visitor management, visitors">
    <meta name="author" content="Neutron IT ">
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="http://neutronit.com/www.neutronit.com"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('panels/landing-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('page-styles'); ?>
</head>


<body class="home page-template-default page page-id-4547 _masterslider _msp_version_3.2.7 gdlr-carousel-no-scroll">
<div class="body-wrapper  float-menu gdlr-header-websolid" data-home="#">

    
    <?php echo $__env->yieldContent('content'); ?>


</div> <!-- .site-wrap -->

<?php echo $__env->yieldContent('page-scripts'); ?>


<?php echo $__env->yieldContent('top-scripts'); ?>
<?php echo $__env->make('panels/landing-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('bottom-scripts'); ?>
</body>
</html>
<?php /**PATH C:\Techxers\Neutron\resources\views/layouts/landing-layoutMaster.blade.php ENDPATH**/ ?>