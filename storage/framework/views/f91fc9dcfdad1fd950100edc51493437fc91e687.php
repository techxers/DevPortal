<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Neutron | Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/fonts/icomoon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/fonts/flaticon/font/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/style.css')); ?>">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="custom/custom3/css.css" rel="stylesheet">
    <link href="custom/custom3/app.css" rel="stylesheet">
    <link href="custom/custom3/sweetalert.css" rel="stylesheet">
    <link href="custom/custom3/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('fonts/font-awesome/5.12/css/all.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('fonts/font-awesome/css/font-awesome.css')); ?>"/>
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
<!-- begin #page-loader -->

<!-- end #page-loader -->
<!-- begin #page-container -->
<div id="page-container" class="">
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image: url(<?php echo e(asset('img/loginsplash2.png')); ?>); background-size: cover"></div>
            <div class="news-image" style="background-image: url(<?php echo e(asset('img/loginsplash.png')); ?>); background-size: contain"></div>


            <div style="position: absolute; bottom: 0;right:0; z-index: 5;color: white">
                <p>
                    <a href="javascript:void(0)">
                        <i class="gdlr-icon fa fa-facebook pl-2"
                           style="color: white;text-shadow: 1px 1px #444; font-size: 20px; "></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="gdlr-icon fa fa-twitter pl-2"
                           style="color: white;text-shadow: 1px 1px #444; font-size: 20px; "></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="gdlr-icon fa fa-youtube pl-2"
                           style="color: white;text-shadow: 1px 1px #444; font-size: 20px; "></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="gdlr-icon fa fa-linkedin-square pl-2"
                           style="color: white;text-shadow: 1px 1px #444; font-size: 20px; "></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="gdlr-icon fa fa-google-plus pl-2"
                           style="color: white;text-shadow: 1px 1px #444; font-size: 20px; "></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="gdlr-icon fa fa-instagram pr-4"
                           style="color: white;text-shadow: 1px 1px #444; font-size: 20px; "></i>
                    </a>
                </p>
            </div>

        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">


            <!-- begin right-content -->
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand">
                    <a href="<?php echo e(route('landing')); ?>">
                        <img src="<?php echo e(asset('img/logo-landing.png')); ?>" class="w-100" style="max-width: 150px">
                    </a>
                </div>
                <div class="icon">
                    <a href="<?php echo e(route('register')); ?>" style="text-decoration: none;color:lightgrey"><i class="fa fa-sign-in"></i></a>
                </div>
            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>


                <h3 class="text-center mb-4 text-uppercase">Sign in to access the portal</h3>
                <form method="POST" action="<?php echo e(route('login')); ?>"
                      class="pl-2 pr-2 justify-content-center text-center align-content-center">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="email"
                               class=""><?php echo e(__('E-Mail Address')); ?></label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend" >
                        <span class="input-group-text p-4"
                              style=""><i
                                    class="feather  icon-mail_outline" style="font-size:20px;padding-left: 4px!important;padding-right: 4px!important;"></i></span>
                            </div>
                            <input id="email" type="email"
                                   class=" p-2 form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email"
                                   autofocus
                                   placeholder="Enter Email Address" style="border-radius: 2px!important;">

                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>


                    <div class="form-group row">
                        <label for="password"
                               class=""><?php echo e(__('Password')); ?></label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                        <span class="input-group-text p-4"><i
                                    class="feather icon-lock_outline" style="font-size:20px;padding-left: 4px!important;padding-right: 4px!important;"></i></span>
                            </div>
                            <input id="password" type="password"
                                   class=" p-2 form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="password"
                                   placeholder="Enter password"
                                   required autocomplete="current-password" style="border-radius: 2px!important;">
                        </div>


                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group row">
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="full-btn w60 text-center col-12 login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg" id="btn-login">

                                <?php echo e(__('LOGIN')); ?>

                            </button>
                        </div>
                    </div>
                    <div class="m-t-20 text-inverse">
                        Forgot password? Click <a
                                href="<?php echo e(route('password.request')); ?>">here</a> to retrieve.
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        Not yet registered? Click <a
                                href="<?php echo e(route('register')); ?>">here</a> to register.
                    </div>
                    <hr>
                    <p class="text-center text-grey-darker mb-0">
                        © 2020 neutronit.com | Powered by Neutron IT
                    </p>

                </form>



            </div>
            <!-- end login-content -->
            <!-- end right-container -->

        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->

</div>
<!-- end page container -->
<!-- ================== BEGIN BASE JS ================== -->
<script src="custom/custom3/jquery"></script>

<script src="custom/custom3/bootstrap"></script>

<script src="custom/custom3/default.js"></script>
<script src="custom/custom3/sweetalert.js"></script>
<!-- ================== END BASE JS ================== -->
</body>
</html><?php /**PATH C:\Techxers\Neutron\resources\views/auth/login.blade.php ENDPATH**/ ?>