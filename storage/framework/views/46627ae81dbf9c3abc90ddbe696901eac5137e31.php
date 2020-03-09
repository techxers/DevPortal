<?php $__env->startSection("page-styles"); ?>
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/animate.min.css')); ?>">
    <style>
        @media (max-width: 991.98px) {
            .slide-one-item .owl-nav {
                display: none;
            }
        }

        .slide-one-item .owl-nav .owl-prev,
        .slide-one-item .owl-nav .owl-next {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.4);
        }

        .slide-one-item .owl-nav .owl-prev:hover,
        .slide-one-item .owl-nav .owl-next:hover {
            color: #fff;
        }

        .slide-one-item .owl-nav .owl-prev {
            left: 20px;
        }

        .slide-one-item .owl-nav .owl-next {
            right: 20px;
        }

        .slide-one-item .owl-dots {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            z-index: 2;
        }

        .slide-one-item .owl-dots .owl-dot {
            display: inline-block;
        }

        .slide-one-item .owl-dots .owl-dot > span {
            -webkit-transition: 0.3s all cubic-bezier(0.32, 0.71, 0.53, 0.53);
            -o-transition: 0.3s all cubic-bezier(0.32, 0.71, 0.53, 0.53);
            transition: 0.3s all cubic-bezier(0.32, 0.71, 0.53, 0.53);
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.4);
            margin: 3px;
        }

        .slide-one-item .owl-dots .owl-dot.active > span {
            width: 20px;
            background: #fff;
        }


        .owl-all .owl-dots {
            text-align: center;
            margin-top: 30px;
        }

        .owl-all .owl-dots .owl-dot {
            display: inline-block;
        }

        .owl-all .owl-dots .owl-dot > span {
            display: inline-block;
            width: 7px;
            height: 7px;
            background: #ccc;
            margin: 5px;
            border-radius: 50%;
        }

        .owl-all .owl-dots .owl-dot.active > span {
            background: #207561;
        }

        @media (min-width: 992px) {
            .owl-all .owl-nav,
            .owl-all .owl-dots {
                display: none;
            }

            .owl-all .owl-stage {
                -webkit-transform: none !important;
                -ms-transform: none !important;
                transform: none !important;
                width: 120% !important;
                padding-top: 10px;
            }

            .owl-all .owl-carousel .owl-stage-outer {
                width: 100%;
                overflow: visible;
            }

            .owl-all .owl-stage-outer > .owl-stage > .owl-item {
                display: -ms-inline-grid;
                display: inline-grid;
                float: none;
                margin-bottom: 30px;
            }
        }


        .slide-one-item .owl-dots, .owl-1 .owl-dots, .owl-2 .owl-dots {
            width: 100%;
            text-align: center;
        }

        .slide-one-item .owl-dots .owl-dot, .owl-1 .owl-dots .owl-dot, .owl-2 .owl-dots .owl-dot {
            display: inline-block;
        }

        .slide-one-item .owl-dots .owl-dot > span, .owl-1 .owl-dots .owl-dot > span, .owl-2 .owl-dots .owl-dot > span {
            width: 7px;
            height: 7px;
            display: inline-block;
            background: #ccc;
            border-radius: 50%;
            margin: 3px;
        }

        .slide-one-item .owl-dots .owl-dot.active > span, .owl-1 .owl-dots .owl-dot.active > span, .owl-2 .owl-dots .owl-dot.active > span {
            width: 7px;
            height: 7px;
            background: #207561;
        }

        .owl-1 .owl-dots {
            bottom: 50px;
            position: relative;
        }

        .owl-1 .owl-dots .owl-dot > span {
            background: #fff;
        }

        .owl-2 .owl-dots {
            bottom: 150px;
            position: relative;
        }

        .owl-2 .owl-dots .owl-dot > span {
            background: #fff;
        }

        .slide-one-item .owl-dots {
            bottom: -20px;
        }

    </style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('panels/landing-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class="owl-carousel owl-1" id="home-section">
        <div class="site-blocks-cover overlay"
             style="background-image: url(<?php echo e(asset("img/heroslide1.png")); ?>);"
             data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1>Hey there, Welcome to <span class="text-primary">NeutronIT.</span></h1>
                        <p>We help you effecitevely manage your visitor</p>
                        <p class="mb-0"><a href="<?php echo e(route('register')); ?>" class="smoothscroll btn btn-primary px-4 py-2 rounded-0">Register Now</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="site-blocks-cover overlay"
             style="background-image: url(<?php echo e(asset("img/heroslide2.png")); ?>);z-index: 44"
             data-aos="fade"
             id="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1>Effectively manage your business <span class="text-primary">easily</span></h1>

                        <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">Increase your business
                            growth with
                            our fully digitized technology services</p>
                        <p class="mb-0"><a href="#how-works" class="smoothscroll btn btn-primary px-4 py-2 rounded-0">How it Works</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="site-blocks-cover overlay"
             style="background-image: url(<?php echo e(asset("img/heroslide3.png")); ?>);z-index: 44"
             data-aos="fade"
             id="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="text-uppercase" data-aos="fade-up">Smart Corporate Reception</h1>
                        <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">Improve your customers/clients experience, by deploying the smart reception service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="#next" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
        </a>
    </div>

    <div class="site-section" id="next">
        <div class="container">
            <div class="row mb-1">
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="">
                    <img src="<?php echo e(asset('img/tracking.svg')); ?>" alt="Free Website Template by Free-Template.co"
                         class="img-fluid w-25 mb-4">
                    <h3 class="card-title">Fast Visitor Check In</h3>
                    <p>Fast and simple visitor registration.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?php echo e(asset('img/notify.svg')); ?>" alt="Free Website Template by Free-Template.co"
                         class="img-fluid w-25 mb-4">
                    <h3 class="card-title">SMS Notification</h3>
                    <p>Send Instant SMS notifications for scheduled appointments</p>
                </div>
                <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="<?php echo e(asset('img/appointment.svg')); ?>"
                         alt="Free Website Template by Free-Template.co" class="img-fluid w-25 mb-4">
                    <h3 class="card-title">Issuing of Appointments</h3>
                    <p>Focus on what you do best, we handle all your appointments.</p>
                </div>

            </div>
            <br><br>
            <div class="row justify-content-center">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="mb-5">
                        <h3 class="h3 mb-4 text-black text-capitalize">Subscribe to our updates</h3>
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
            <div class="row mb-1 justify-content-center ">
                <div class="col-md-8 text-center">
                    <h2 class="section-title mb-1" data-aos="fade-up" data-aos-delay="">About Us</h2>
                    <p class="lead" data-aos="fade-up" data-aos-delay="100">NeutronIT is a team of innovative and
                        creative professionals who understand the need of
                        customer focused solutions. With our experience you can trust us to provide you with high
                        quality and secure software solutions.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                    <figure class="circle-bg mt-2">
                        <img src="<?php echo e(asset('img/company_env.png')); ?>" alt="NeutronIT Logo" class="img-fluid">
                    </figure>
                </div>
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">

                    <h3 class="text-black mb-4">We Manage your visitors for you</h3>


                    <p><b>Smart Security Desk</b></p>
                    <ul>
                        <li>Maintain an electronic visitor book for you building/estate</li>
                        <li>Keep a record of assets that your visitor brings to your building/estate</li>
                        <li>Free end user android application</li>
                        <li>Broadcast text messages to visitors</li>
                    </ul>

                    <p><b>Smart Reception </b></p>
                    <ul>
                        <li>Maintain an electronic visitor book for your organization</li>
                        <li>Electronic booking of visits</li>
                        <li>Schedule appointments of your visitors</li>
                        <li>Send reminder SMS to your customer</li>
                    </ul>


                </div>
            </div>

        </div>
    </div>

    <section class="site-section" id="how-works">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">How It Works</h2>
                    <p class="lead" data-aos="fade-up" data-aos-delay="100"> Simple and easy steps.. </p>
                </div>
            </div>

            <div class="row align-items-lg-center">
                <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">

                    <div class="owl-carousel slide-one-item-alt">
                        <img src="<?php echo e(asset('img/slide_1.png')); ?>" alt="Image" class="img-fluid">
                        <img src="<?php echo e(asset('img/slide_2.png')); ?>" alt="Image" class="img-fluid">
                        <img src="<?php echo e(asset('img/slide_3.png')); ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="custom-direction">
                        <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a
                                href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
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


    <section class="site-section" id="pricing-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="section-title mb-3">Pricing</h2>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <?php $__currentLoopData = \App\Service::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing">
                            <h3 class="text-center text-black"><?php echo e($service->title); ?></h3>
                            <div class="price text-center mb-4 ">
                                <span><span><?php echo e($service->pricing); ?></span> / month</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <?php $__currentLoopData = explode(';',$service->details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($det); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <p class="text-center">
                                <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Subscribe Now</a>
                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </section>



    <section class="site-section" id="contact-section" data-aos="fade">
        <div class="container" style="width:70%!important;">
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
                        <a href="tel:+254712345678">+254 712 345 678</a>
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="mb-0">
                        <span class="icon-mail_outline d-block h2 text-primary"></span>
                        <a href="mailto:youremail@neutrontechnologies.co.ke">youremail@neutrontechnologies.co.ke</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-5">


                    <div class="card rounded-lg" style="background: linear-gradient(to left, rgba(255,255,255,1) 50%, rgb(200,200,200));">
                        <div class="card-body">
                            <form action="mailto:youremail@neutrontechnologies.co.ke" method="post" enctype="text/plain" class="p-5">

                                <h2 class="h4 text-black mb-5">Contact Form</h2>

                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="text-black" for="fname">First Name</label>
                                        <input type="text" id="fname" class="form-control text-capitalize" name="firstName">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="lname">Last Name</label>
                                        <input type="text" id="lname" class="form-control text-capitalize" name="lastName">
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="email">Email</label>
                                        <input type="email" id="email" class="form-control text-lowercase" name="email">
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="subject">Subject</label>
                                        <input type="text" id="subject" class="form-control text-capitalize" name="subject">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                                                  placeholder="Write your notes or questions here..."></textarea>
                                    </div>

                                </div>

                                <div class="row form-group justify-content-between">
                                    <div class="col-md-12">
                                        <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                                        <input type="reset" value="Reset" class="btn btn-primary btn-md text-white btn-sm" style="opacity: .7;">
                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <?php echo $__env->make('panels/landing-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("bottom-scripts"); ?>
    <script src="<?php echo e(asset('landing-page/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('landing-page/js/jquery.animateNumber.min.js')); ?>"></script>
    <script>
        jQuery(document).ready(function ($) {

            "use strict";


            var siteCarousel = function () {
                if ($('.nonloop-block-13').length > 0) {
                    $('.nonloop-block-13').owlCarousel({
                        center: false,
                        items: 1,
                        loop: true,
                        stagePadding: 0,
                        margin: 0,
                        smartSpeed: 1000,
                        autoplay: true,
                        nav: true,
                        navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                        responsive: {
                            600: {
                                margin: 0,
                                nav: true,
                                items: 2
                            },
                            1000: {
                                margin: 0,
                                stagePadding: 0,
                                nav: true,
                                items: 2
                            },
                            1200: {
                                margin: 0,
                                stagePadding: 0,
                                nav: true,
                                items: 3
                            }
                        }
                    });
                }


                $('.owl-1').owlCarousel({
                    animateOut: 'fadeOut',
                    center: true,
                    items: 1,
                    loop: true,
                    margin: 0,
                    smartSpeed: 1500,
                    autoplay: true,
                    pauseOnHover: false
                })
                $('.owl-2').owlCarousel({
                    animateOut: 'fadeOut',
                    center: true,
                    items: 1,
                    loop: true,
                    margin: 0,
                    smartSpeed: 1500,
                    autoplay: true,
                    pauseOnHover: false
                })

                $('.slide-one-item').owlCarousel({
                    center: false,
                    items: 1,
                    loop: true,
                    stagePadding: 0,
                    margin: 0,
                    smartSpeed: 1500,
                    autoplay: true,
                    pauseOnHover: false,
                    dots: true,
                    nav: true,
                    navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
                });

                if ($('.owl-all').length > 0) {
                    $('.owl-all').owlCarousel({
                        center: false,
                        items: 1,
                        loop: false,
                        stagePadding: 0,
                        margin: 0,
                        autoplay: false,
                        nav: false,
                        dots: true,
                        touchDrag: true,
                        mouseDrag: true,
                        smartSpeed: 1000,
                        navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                        responsive: {
                            768: {
                                margin: 30,
                                nav: false,
                                responsiveRefreshRate: 10,
                                items: 1
                            },
                            992: {
                                margin: 30,
                                stagePadding: 0,
                                nav: false,
                                responsiveRefreshRate: 10,
                                touchDrag: false,
                                mouseDrag: false,
                                items: 3
                            },
                            1200: {
                                margin: 30,
                                stagePadding: 0,
                                nav: false,
                                responsiveRefreshRate: 10,
                                touchDrag: false,
                                mouseDrag: false,
                                items: 3
                            }
                        }
                    });
                }

            };
            siteCarousel();


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/landing-layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/landing/0index.blade.php ENDPATH**/ ?>