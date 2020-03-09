<!doctype html>
<html lang="en">
<head>
    <title>Acquire the VSM System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('font/icomoon/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/home/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/home/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/home/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/home/owl.theme.default.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/home/jquery.fancybox.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/home/bootstrap-datepicker.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('font/flaticon.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/home/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/home/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/nt-styles.css')); ?>">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border brand-red" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="site-wrap">


    <?php echo $__env->make('layouts.navbar-landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div>
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <section class="site-section regSel" id="pricing-section">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-12 text-center" data-aos="fade-up">
                            <h2 class="section-title mb-3">Select Pricing</h2>
                        </div>
                    </div>
                    <div class="row mb-5 justify-content-center" id="pricing-select">
                        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="">
                            <a href="javascript:void(0)" style="color: grey" onclick="pricingSelected(0)">
                                <div class="pricing">
                                    <h3 class="text-center text-black">Smart Security Desk</h3>
                                    <div class="price text-center mb-4 ">
                                        <span><span>10,000</span> / month</span>
                                    </div>
                                    <ul class="list-unstyled ul-check success mb-5">
            
                                        <li>Electronic booking of visits</li>
                                        <li>Free end user android application</li>
                                        <li>Verify visitor details government records</li>
                                        <li>Broadcast SMS to visitors/customers</li>
                                        <li> Generate reports</li>
                                    </ul>
                                    <p class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-secondary btnsel"
                                           onclick="bringForm(0)">select</a>
                                    </p>
                                </div>
                        </div>
        
                        <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pricing-popular" data-aos="fade-up" data-aos-delay="100">
                            <a href="javascript:void(0)" style="color: grey" onclick="pricingSelected(1)">
                                <div class="pricing">
                                    <h3 class="text-center text-black">Smart Corporate Reception</h3>
                                    <div class="price text-center mb-4 ">
                                        <span><span>10,000</span> / month</span>
                                    </div>
                                    <ul class="list-unstyled ul-check success mb-5">
            
                                        <li>Electronic booking of visits</li>
                                        <li>Visitors Appointments Scheduling</li>
                                        <li>Broadcast SMS to visitors/customers</li>
                                        <li>Verify visitor details government records</li>
                                        <li>Generate reports</li>
                                    </ul>
                                    <p class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-primary btnsel"
                                           onclick="bringForm(1)">Proceed</a>
                                    </p>
                                </div>
                        </div>
                </div>
                <div style="display: none;visibility: hidden"><label for="service">Subscription type</label><input
                            class="form-control  form-control-alternative"
                            name="service"
                            required id="service" value="1">
                </div>
            </section>

            <section class="site-section regSel" style="display: none;" id="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-5">

                            <div class="col-12 text-center" data-aos="fade-up">
                                <h2 class="section-title mb-3">Complete the form below</h2>
                            </div>
                            <br>
                            <div>
                                <?php echo csrf_field(); ?>
                                <fieldset>
                                    <h5 class="brand-red pb-2">Company Details</h5>
                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="title"><?php echo e(__('Title')); ?> <span class="brand-blue">&ast;</span>
                                            </label>
                                            <input id="title" type="text"
                                                   class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                   name="title" value="<?php echo e(old('title')); ?>" autocomplete="title"
                                                   autofocus
                                                   placeholder="Company/Event/organisation" required>
                                            <?php if($errors->has('title')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> <!-- form-group end.// -->

                                        <div class="col form-group">
                                            <label for="tel"><?php echo e(__('Telephone')); ?> <span
                                                        class="brand-blue">&ast;</span></label>
                                            <input id="tel" type="tel"
                                                   class="form-control<?php echo e($errors->has('tel') ? ' is-invalid' : ''); ?>"
                                                   name="tel" value="<?php echo e(old('tel')); ?>" autocomplete="tel"
                                                   placeholder="" required>
                                            <?php if($errors->has('tel')): ?>
                                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('tel')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->

                                    <div class="form-group">
                                        <label for="company_email">Email address <span
                                                    class="brand-blue">&ast;</span></label>
                                        <input id="company_email" type="email"
                                               class="form-control<?php echo e($errors->has('company_email') ? ' is-invalid' : ''); ?>"
                                               name="company_email" value="<?php echo e(old('company_email')); ?>"
                                               autocomplete="company_email" required>

                                        <small class="form-text text-muted pl-3"
                                               style="text-transform: lowercase!important;">We'll never share your email
                                            with anyone
                                            else.
                                        </small>

                                        <?php if($errors->has('company_email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('company_email')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div> <!-- form-group end.// -->
                                </fieldset>

                                <fieldset>
                                    <h5 class="brand-red pb-2">Company Type</h5>
                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="industry"><?php echo e(__('Industry')); ?> </label>
                                            <select id="industry" class="form-control" name="industry">
                                                <option>Select Industry</option>
                                                <option value="Fashion">Fashion</option>
                                                <option value="ComputerIndustry">Computers</option>
                                                <option value="Chemicals">Chemicals</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                            </select>
                                        </div> <!-- form-group end.// -->

                                        <div class="col form-group">
                                            <label for="type"><?php echo e(__('Type')); ?> </label>
                                            <select id="type" class="form-control" name="type">
                                                <option value="Public" selected="">Public</option>
                                                <option value="Self-Employed">Self-Employed</option>
                                                <option value="Non-Profit">Non-Profit</option>
                                                <option value="Sole-Proprietorship">Sole Proprietorship</option>
                                                <option value="Private">Private</option>
                                                <option value="PrivatePartnership">Partnership</option>
                                            </select>

                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->

                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input id="website" type="url"
                                               class="form-control<?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"
                                               name="website" value="<?php echo e(old('website')); ?>" autocomplete="website"
                                               autofocus
                                               placeholder="Begin with http:// or https:// or www.">
                                        <?php if($errors->has('website')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('website')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div> <!-- form-group end.// -->

                                </fieldset>
                                <br>
                                <fieldset>
                                    <h5 class="brand-red pb-2">Physical Address</h5>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="city"><?php echo e(__('City')); ?> <span
                                                        class="brand-blue">&ast;</span></label>
                                            <input id="city" type="text"
                                                   class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>"
                                                   name="city" value="<?php echo e(old('city')); ?>" autocomplete="city"
                                                   placeholder="" required>
                                            <?php if($errors->has('city')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('city')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div> <!-- form-group end.// -->

                                        <div class="form-group col-md-6">
                                            <label for="country"><?php echo e(__('Country')); ?> <span
                                                        class="brand-blue">&ast;</span></label>
                                            <select id="country" class="form-control" name="country" required>
                                                <option> Choose...</option>
                                                <option value="Kenya" selected="selected">Kenya</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Rwanda">Rwanda</option>
                                            </select>
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-group">
                                        <label for="postcode"><?php echo e(__('Postal Address')); ?>

                                        </label>
                                        <input id="postcode" type="text"
                                               class="form-control<?php echo e($errors->has('postcode') ? ' is-invalid' : ''); ?>"
                                               name="postcode" value="<?php echo e(old('postcode')); ?>" autocomplete="postcode"
                                               placeholder="P.O BOX 123...">
                                        <?php if($errors->has('postcode')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('postcode')); ?></strong>
                                            </span>
                                        <?php endif; ?>

                                    </div> <!-- form-group end.// -->

                                    <br>
                                    <div class="form-group brand-red border" style="padding: 8px;">
                                        <label>
                                            <input type="checkbox" class="checkbox brand-red"
                                                   onchange="document.getElementById('userForm').classList.toggle('collapse');document.getElementById('regBtn').disabled=!this.checked"
                                                   required>
                                            I verify that I am an authorized representative of this organisation and
                                            have
                                            the
                                            right to act on its behalf in the creation and management of this page. The
                                            organisation and I agree to the additional terms for Pages.
                                        </label>

                                        <div class="collapse" id="userForm">
                                            <h5 class="brand-red pb-2 pt-3 text-underline"><u>Please Fill your personal
                                                    details</u></h5>
                                            <div class="form-row">

                                                <div class="col form-group">
                                                    <label for="name"><?php echo e(__('Fullname')); ?></label>
                                                    <input type="text" name="name"
                                                           placeholder="" id="name"
                                                           class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                           value="<?php echo e(old('name')); ?>" autocomplete="name" required>
                                                </div> <!-- form-group end.// -->
                                                <div class="col form-group">
                                                    <label for="email"><?php echo e(__('Email')); ?></label>
                                                    <input id="email" type="email"
                                                           class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                           name="email" value="<?php echo e(old('email')); ?>" autocomplete="email"
                                                           required>

                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div> <!-- form-group end.// -->
                                            </div> <!-- form-row end.// -->
                                            <div class="form-group">
                                                <label for="password"><?php echo e(__('Password')); ?></label>
                                                <input id="password" type="password"
                                                       class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       name="password" required autocomplete="new-password" required>
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
                                            <div class="form-group">
                                                <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" autocomplete="new-password"
                                                       required>

                                            </div><!-- form-group end.// -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"
                                                id="regBtn" disabled> Complete Registration
                                        </button>
                                    </div> <!-- form-group// -->

                                </fieldset>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        </form>


        <?php echo $__env->make('layouts.footer-landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div> <!-- .site-wrap -->

    <script src="<?php echo e(asset('js/home/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/jquery.fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/jquery.sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/gen.js')); ?>"></script>

</div>
</body>
</html><?php /**PATH C:\Techxers\Neutron\resources\views/auth/register.blade.php ENDPATH**/ ?>