<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Page Error</title>
    <?php echo $__env->make('panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/error.css')); ?>">
</head>


<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <section class="row flexbox-container">
                <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                    <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="<?php echo e(asset('img/home/404.png')); ?>" class="img-fluid align-self-center"
                                     alt="branding logo">
                                <h1 class="font-large-2 my-1">404 - Page Not Found!</h1>
                                <p class="p-2">
                                    This page does not exist in our system, please contact the Neutron administrators or you can go back to the home page
                                </p>
                                <a class="btn btn-primary btn-lg mt-2" href="<?php echo e(asset(route('landing'))); ?>">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

</body>
</html><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/errors/404.blade.php ENDPATH**/ ?>