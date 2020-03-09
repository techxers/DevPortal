<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - Neutron VMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('img/brand/browser_baricon.png')); ?>">

    
    <?php echo $__env->make('panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('mystyle'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/calendars/fullcalendar.css')); ?>">

</head>



<?php echo $__env->make('layouts.verticalLayoutMaster' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/layouts/contentLayoutMaster.blade.php ENDPATH**/ ?>