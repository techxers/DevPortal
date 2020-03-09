<?php $__env->startSection('title', 'Forgot Password'); ?>


<?php $__env->startSection('content'); ?>

    <div class="site-blocks-cover overlay"
         style="background-image: url(<?php echo e(asset("img/hero-landing.png")); ?>);position: absolute;top: 0%; bottom: 0; left: 0;right: 0;"
         data-aos="fade"
         id="home-section"></div>
    <?php echo $__env->make('panels/landing-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container login"
         style="position: absolute;top: 15%; bottom: 0; left: 0;right: 0;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card pt-4 pb-3 text-white"
                     style="background-color:rgba(0,0,0,0.51);background-blend-mode: color; background-image: url(<?php echo e(asset("img/hero-login.png")); ?>);width: 90%;border-radius: 24px!important; background-size: contain;">
                    <div class="card-body pb-8 pt-8">
                        <h3 class="text-center shadow pb-4 text-uppercase"><?php echo e(__('Confirm Password')); ?></h3>

                        <?php echo e(__('Please confirm your password before continuing.')); ?>


                        <form method="POST" action="<?php echo e(route('password.confirm')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Confirm Password')); ?>

                                    </button>

                                    <?php if(Route::has('password.request')): ?>
                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/landing-layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/auth/passwords/confirm.blade.php ENDPATH**/ ?>