<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(__('Password')); ?>">

    <title>VSM Portal</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Theme Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery/jquery-3.4.1.min.js')); ?>">
    <script src="<?php echo e(asset('css/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(asset('font/fontawesome/css/all.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('font/nucleo/css/nucleo.css')); ?>"/>



</head>
<body>
<div class="page-header-image"></div>
<div class="container login" style="position: absolute;top: 15%; bottom: 0; left: 0;right: 0;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white pt-4 pb-5" style="width: 90%;;border-radius: 64px!important;">

                <div class="card-body">
                    <h3 class="text-center shadow pb-4 text-uppercase">Sign in to access the portal</h3>
                    <form method="POST" action="<?php echo e(route('login')); ?>"
                          class="pl-5 pr-5 justify-content-center text-center align-content-center">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="email"
                                   class=""><?php echo e(__('E-Mail Address')); ?></label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                        <span class="input-group-text"
                              style=""><i
                                    class="ni ni-email-83"></i></span>
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
                                       name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus
                                       placeholder="Enter Email Address">

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
                        <span class="input-group-text"><i
                                    class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" type="password"
                                       class=" p-2 form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                       placeholder="Enter password"
                                       required autocomplete="current-password">
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
                            <div class="full-btn w60 text-center col-12">
                                <button type="submit" class="btn btn-danger  btn-block btn-hover" style="font-size: 16px;border-radius: 30px;padding: 10px 30px;" >
                                    <?php echo e(__('LOGIN')); ?>

                                </button>

                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link text-white" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copy text-center" style="position: absolute;bottom: 8px; left: 0; right: 10%;">
    <img src="<?php echo e(asset('img/brand/logo-bare.png')); ?>" class="w-100" style="max-width: 80px">
    <b>
        <span style="background-color: rgba(222,227,234,0.5);font-size: 18px;color: rgb(234, 67, 53)" class="p-2">
        &copy;
    <script>
        document.write(new Date().getFullYear())
    </script>
    Neutron Technologies
    </span>
    </b>
</div>
</body>
</html><?php /**PATH C:\Techxers\Neutron\resources\views/portal/auth/login.blade.php ENDPATH**/ ?>