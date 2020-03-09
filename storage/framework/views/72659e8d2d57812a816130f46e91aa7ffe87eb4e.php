<!doctype html>
<html lang="en">
<head>
    <title>NeutronIT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <?php echo $__env->make('layouts.navbar-landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo e(asset('img/home/lgn_bg.png')); ?>);"
         data-aos="fade" id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">


                <div class="col-md-10 mt-lg-5 text-center">
                    <div class="single-text owl-carousel">
                        <div class="slide">
                            <h1 class="text-uppercase cs-text-shadow" data-aos="fade-up">Technology Solutions for your
                                Business</h1>
                            <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100"><b>“Increase your business
                                    opportunities with
                                    our technology services”</b></p>

                            <div data-aos="fade-up" data-aos-delay="100">
                            </div>
                        </div>

                        <div class="slide">
                            <h1 class="text-uppercase cs-text-shadow" data-aos="fade-up">Smart Corporate Reception</h1>
                            <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100"><b>Schedule Appointments with
                                    your clients.</b></p>
                        </div>

                        <div class="slide">
                            <h1 class="text-uppercase cs-text-shadow" data-aos="fade-up">Smart Security Desk</h1>
                            <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100"><b>Automate Visitors Check
                                    In</b></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <a href="#next" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
        </a>
    </div>

    <div class="site-section" id="next">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="">
                    <img src="img/home/a_tracking.svg" alt="Free Website Template by Free-Template.co"
                         class="img-fluid w-25 mb-4">
                    <h3 class="card-title">Fast Visitor Check In</h3>
                    <p>Fast and simple visitor registration.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="img/home/b_notify.svg" alt="Free Website Template by Free-Template.co"
                         class="img-fluid w-25 mb-4">
                    <h3 class="card-title">SMS Notification</h3>
                    <p>Send Instant SMS notifications for scheduled appointments</p>
                </div>
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="img/home/b_appointment.svg"
                         alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4">
                    <h3 class="card-title">Issuing of Appointments</h3>
                    <p>Focus on what you do best, we handle all your appointments.</p>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="mb-5">
                        <h3 class="h3 mb-5 text-black"></h3>
                        <p>Would you like to receive updates from us?</p>

                    </div>
                    <div class="mb-4">
                        <form action="#">
                            <div class="form-group d-flex align-items-center">
                                <input type="text" class="form-control mr-2" placeholder="Enter your email">
                                <input type="submit" class="btn btn-primary" value="Submit Email">
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="site-section cta-big-image" id="about-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="section-title mb-5" data-aos="fade-up" data-aos-delay="">About Us</h2>
                    <p class="lead" data-aos="fade-up" data-aos-delay="100"><b>NeutronIT is a team of innovative and
                            creative professionals who understand the need of
                            customer focused solutions. With our experience you can trust us to provide you with high
                            quality and secure software solutions.</b></p>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="">

                    <img src="img/home/neutron_bg.png" alt="Free Website Template by Free-Template.co"
                         class="img-fluid">

                </div>
            </div>
            <div class="mb-5">
                <div class="row justify-content-center mb-5">

                    <div class="" data-aos="fade-up" data-aos-delay="100">

                        <h3 class="text-black mb-4">We Manage your visitors for you</h3>

                        <p><b>Smart Security Desk</b>
                        <ul>
                            <li>Maintain an electronic visitor book for you building/estate</li>
                            <li>Keep a record of assets that your visitor brings to your building/estate</li>
                            <li>Free end user android application</li>
                            <li>Broadcast text messages to visitors</li>
                        </ul>
                        </p>

                        <p><b>Smart Reception </b>
                        <ul>
                            <li>Maintain an electronic visitor book for your organization</li>
                            <li>Electronic booking of visits</li>
                            <li>Schedule appointments of your visitors</li>
                            <li>Send reminder SMS to your customer</li>
                        </ul>
                        </p>

                    </div>
                </div>

            </div>
        </div>

        <section class="site-section">
            <div class="container">

                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center" id="gallery-section">
                        <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">How It Works</h2>
                        <p class="lead" data-aos="fade-up" data-aos-delay="100">Simple and easy steps...</p>
                    </div>
                </div>

                <div class="row align-items-lg-center">
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">

                        <div class="owl-carousel slide-one-item-alt">
                            <img src="img/home/slide_1.jpg" alt="Image" class="img-fluid">
                            <img src="img/home/slide_2.jpg" alt="Image" class="img-fluid">
                            <img src="img/home/slide_3.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="custom-direction">
                            <a href="#" class="custom-prev"><span><span
                                            class="icon-keyboard_backspace"></span></span></a><a
                                    href="#" class="custom-next"><span><span
                                            class="icon-keyboard_backspace"></span></span></a>
                        </div>

                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">

                        <div class="owl-carousel slide-one-item-alt-text">
                            <div>
                                <h2 class="section-title mb-3">01. Visitor Check in</h2>
                                <p>Easy and fast visitor check in at the security desk including the possessions they
                                    bare. </p>

                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>
                            <div>
                                <h2 class="section-title mb-3">02. Instant Notification</h2>
                                <p>Visit is automatically stored and for appointments the office is notified.</p>
                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>
                            <div>
                                <h2 class="section-title mb-3">03. Management Dashboard</h2>
                                <p>Easily monitor and keep track of the visitors in the organization with an intuitive
                                    dashboard.
                                </p>

                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>

        

        <section class=" bg-light" id="contact-section" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="section-title mb-3">Contact Us</h2>
                    </div>
                </div>
                <div class="row mb-5">


                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-room d-block h2 text-primary"></span>
                            <span>TechXpress Office, Nairobi, Kenya</span>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-phone d-block h2 text-primary"></span>
                            <a href="#">+254 712 345 678</a>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-0">
                            <span class="icon-mail_outline d-block h2 text-primary"></span>
                            <a href="#">youremail@neutrontechnologies.co.ke</a>
                        </p>
                    </div>
                </div>
                <div class="row" id="#register-section">
                    <div class="col-md-12 mb-5">


                        <form action="#" class="p-5 bg-white">

                            <h2 class="h4 text-black mb-5">Contact Form</h2>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">First Name</label>
                                    <input type="text" id="fname" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="lname">Last Name</label>
                                    <input type="text" id="lname" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label>
                                    <input type="email" id="email" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Subject</label>
                                    <input type="subject" id="subject" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                                              placeholder="Write your notes or questions here..."></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </section>


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
                        <?php $__currentLoopData = \App\Service::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="">
                                <a href="javascript:void(0)" style="color: grey" onclick="pricingSelected(0)">
                                    <div class="pricing">
                                        <h3 class="text-center text-black"><?php echo e($service->title); ?></h3>
                                        <div class="price text-center mb-4 ">
                                            <span><span>10,000</span> / month</span>
                                        </div>
                                        <ul class="list-unstyled ul-check success mb-5">
                                            <?php $__currentLoopData = explode(';',$service->details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($det); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <p class="text-center">
                                            <a href="javascript:void(0)" class="btn btn-secondary btnsel"
                                               onclick="bringForm(0)">select</a>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div style="display: none;visibility: hidden"><label for="service">Subscription type</label><input
                                class="form-control  form-control-alternative"
                                name="service"
                                required id="service" value="1">
                    </div>
                </div>
            </section>

            <section class="site-section regSel" style="display: none;" id="register-section">
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
    <script src="<?php echo e(asset('js/home/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/gen.js')); ?>"></script>
    <script src="<?php echo e(asset('js/home/main.js')); ?>"></script>

</body>
</html><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/landing/oldindex.blade.php ENDPATH**/ ?>