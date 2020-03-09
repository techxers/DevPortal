<?php $__env->startSection("page-styles"); ?>
    <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/animate.min.css')); ?>">
    <style>
        blockquote {
            position: relative;
            padding: 16px 8px!important;
            border: 0px!important;
            font-size: 24px!important;
            /* background: #ddd; */
        }

        blockquote:before {
            position: absolute;
            content: open-quote;
            font-size: 4em;
            margin-left: -0.6em;
            margin-top: -0.4em;
        }
        blockquote:after {
            position: absolute;
            content: close-quote;
            font-size: 4em;
            bottom: 0;
            right: 0;
            margin-right: -0.6em;
            margin-bottom: -0.8em;
        }
        blockquote p {
            display: inline;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('panels/landing-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content-wrapper">
        <div class="gdlr-content">

            <!-- Above Sidebar Section-->

            <!-- Sidebar With Content Section-->
            <div class="with-sidebar-wrapper">
                <section id="content-section-1">
                    <div class="gdlr-full-size-wrapper gdlr-show-all "
                         style="padding-bottom: 0px;  background-color: #ffffff; ">
                        <div class="gdlr-master-slider-item gdlr-slider-item gdlr-item" style="margin-bottom: 0px;">
                            <!-- MasterSlider -->
                            <div id="P_MS5c0e2bf129c3d" class="master-slider-parent ms-parent-id-1">

                                <!-- MasterSlider Main -->
                                <div id="MS5c0e2bf129c3d" class="master-slider ms-skin-default">


                                    <div class="ms-slide" data-delay="8" data-fill-mode="fill"
                                         style="text-shadow: 1px 1px 0 #444;">
                                        <img src="<?php echo e(asset('custom/custom2/plugins/masterslider/public/assets/css/blank.gif')); ?>"
                                             alt="" title="" data-src="<?php echo e(asset("img/hero-slide1.png")); ?>"/>

                                        <div class="ms-layer  msp-cn-1-5" style="color:#ff3a3d"
                                             data-effect="t(true,n,n,-500,n,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                             data-ease="easeOutQuint" data-offset-x="9" data-offset-y="350"
                                             data-origin="bl" data-position="normal">
                                      <span style="color:
                                               #ff3a3d"> At NeutronIT</span></div>

                                        <div class="ms-layer  msp-cn-1-6" style="color:#ff3a3d"
                                             data-effect="t(true,n,n,-500,n,n,n,n,n,n,n,n,n,n,n)" data-duration="362"
                                             data-delay="337" data-ease="easeOutQuint" data-offset-x="13"
                                             data-offset-y="300" data-origin="bl" data-position="normal">
                                            <span style="color: #ff3a3d">We focus on innovative products that will grow your</span>
                                        </div>

                                        <div class="ms-layer  msp-cn-1-7" style="color:#ff3a3d"
                                             data-effect="t(true,n,n,-1500,250,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                             data-delay="675" data-ease="easeOutQuint" data-offset-x="3"
                                             data-offset-y="175" data-origin="bl" data-position="normal">
                                               <span style="color:
                                               #ff3a3d;text-transform: uppercase;">business</span></div>

                                        <a href="#about-us" target="_self"
                                           class="ms-layer ms-btn ms-btn-box ms-btn-n msp-preset-btn-160"
                                           data-effect="t(true,150,n,n,n,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                           data-delay="1025" data-ease="easeOutQuint" data-type="button"
                                           data-offset-x="13" data-offset-y="125" data-origin="bl"
                                           data-position="normal">Learn More</a>

                                    </div>


                                    <div class="ms-slide" data-delay="8" data-fill-mode="fill"
                                         style="text-shadow: 1px 1px 0 #444;">
                                        <img src="<?php echo e(asset('custom/custom2/plugins/masterslider/public/assets/css/blank.gif')); ?>"
                                             alt="" title="" data-src="<?php echo e(asset("img/hero-slide2.png")); ?>"/>

                                        <div class="ms-layer  msp-cn-1-5" style="color:#ff3a3d"
                                             data-effect="t(true,n,n,-500,n,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                             data-ease="easeOutQuint" data-offset-x="9" data-offset-y="350"
                                             data-origin="bl" data-position="normal">
                                            Manage your
                                        </div>

                                        <div class="ms-layer  msp-cn-1-6"
                                             data-effect="t(true,n,n,-500,n,n,n,n,n,n,n,n,n,n,n)" data-duration="362"
                                             data-delay="337" data-ease="easeOutQuint" data-offset-x="13"
                                             data-offset-y="300" data-origin="bl" data-position="normal"
                                             style="color:#ff3a3d!important; text-shadow: 1px 1px 0 #444">
                                            visitors using our
                                        </div>

                                        <div class="ms-layer  msp-cn-1-7"
                                             data-effect="t(true,n,n,-1500,250,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                             data-delay="675" data-ease="easeOutQuint" data-offset-x="3"
                                             data-offset-y="175" data-origin="bl" data-position="normal"
                                             style="color:#ff3a3d">
                                            E-Security tool
                                        </div>

                                        <a href="#content-section-3" target="_self"
                                           class="ms-layer ms-btn ms-btn-box ms-btn-n msp-preset-btn-160"
                                           data-effect="t(true,150,n,n,n,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                           data-delay="1025" data-ease="easeOutQuint" data-type="button"
                                           data-offset-x="13" data-offset-y="125" data-origin="bl"
                                           data-position="normal">Learn More</a>

                                    </div>


                                    <div class="ms-slide" data-delay="8" data-fill-mode="fill"
                                         style="text-shadow: 1px 1px 0 #444;">
                                        <img src="<?php echo e(asset('custom/custom2/plugins/masterslider/public/assets/css/blank.gif')); ?>"
                                             alt="" title="" data-src="<?php echo e(asset("img/hero-slide3.png")); ?>"/>

                                        <div class="ms-layer  msp-cn-1-5"
                                             data-effect="t(true,n,n,-500,n,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                             data-ease="easeOutQuint" data-offset-x="9" data-offset-y="350"
                                             data-origin="bl" data-position="normal" style="color:#ff3a3d">
                                            Improve your
                                        </div>

                                        <div class="ms-layer  msp-cn-1-6"
                                             data-effect="t(true,n,n,-500,n,n,n,n,n,n,n,n,n,n,n)" data-duration="362"
                                             data-delay="337" data-ease="easeOutQuint" data-offset-x="13"
                                             data-offset-y="300" data-origin="bl" data-position="normal"
                                             style="color:#ff3a3d">
                                            corporate image by using our
                                        </div>

                                        <div class="ms-layer  msp-cn-1-7"
                                             data-effect="t(true,n,n,-1500,250,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                             data-delay="675" data-ease="easeOutQuint" data-offset-x="3"
                                             data-offset-y="175" data-origin="bl" data-position="normal"
                                             style="color:#ff3a3d">
                                            E-Reception tool
                                        </div>

                                        <a href="#content-section-3" target="_self"
                                           class="ms-layer ms-btn ms-btn-box ms-btn-n msp-preset-btn-160"
                                           data-effect="t(true,150,n,n,n,n,n,n,n,n,n,n,n,n,n)" data-duration="337"
                                           data-delay="1025" data-ease="easeOutQuint" data-type="button"
                                           data-offset-x="13" data-offset-y="125" data-origin="bl"
                                           data-position="normal">Learn More</a>

                                    </div>

                                </div>
                                <!-- END MasterSlider Main -->

                            </div>
                            <!-- END MasterSlider -->


                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </section>

                <section id="content-section-3">
                    <div id="products"></div>
                    <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                         style="background-color: #ffffff; padding-top: 85px; padding-bottom: 30px; ">

                        <div class="gdlr-item gdlr-about-us-item">
                            <h3 class="about-us-title">Products</h3>
                            <div class="about-us-caption" style="color:#000">The products/services available at our
                                arsenal
                            </div>
                            <div class="about-us-divider"></div>
                            <br>
                        </div>

                        <div class="container">
                            <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="six columns" style="text-align: left">
                                    <div class="gdlr-ux column-service-ux">
                                        <div class="gdlr-item gdlr-column-service-item gdlr-type-1"
                                             style="margin-bottom: 30px;">
                                            <div class="column-service-image"><img
                                                        src="<?php echo e(asset('custom/custom2/upload/icon-about-9.png')); ?>" alt=""
                                                        width="40"
                                                        height="40"/></div>
                                            <div class="column-service-content-wrapper">
                                                <h3 class="column-service-title"
                                                    style="font-size: 24px;color: #63a8fa; text-shadow: 1px 1px 0 #ddd;"><?php echo e($product->title); ?></h3>
                                                <p class="small"><?php echo e($product->description); ?></p>
                                                <div class="column-service-content gdlr-skin-content"
                                                     style="padding-bottom: 16px">
                                                    <ul class="list-unstyled ul-check success mb-5"
                                                        style="list-style-image: url('img/pin_52px.png');">
                                                        <?php $__currentLoopData = explode(';',$product->functionality); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $func): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(strlen($func)<1): ?>
                                                                <?php continue; ?>;
                                                            <?php endif; ?>
                                                            <li>
                                                                <div style="padding-top: 4px;padding-bottom: 4px">
                                                                    <?php echo e($func); ?>

                                                                </div>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <a href="#plan<?php echo e($product->id); ?>"
                                                       style="border: 1px solid #63a8fa; padding: 8px;color: #63a8fa">
                                                        View Plans
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="clear"></div>
                        <br><br>

                    </div>
                    <div class="clear"></div>
                </section>


                <section id="content-section-7">
                    <div class="gdlr-parallax-wrapper gdlr-background-image gdlr-show-all gdlr-skin-dark-skin"
                         id="gdlr-parallax-wrapper-1" data-bgspeed="0.1"
                         style="background-image: url('<?php echo e(asset("img/parallax-bg.png")); ?>'); padding-top: 185px; padding-bottom: 85px; ">
                        <style type="text/css" scoped>
                            @media  only screen and (max-width: 767px) {
                                #gdlr-parallax-wrapper-1 {
                                    background-image: url('<?php echo e(asset("img/parallax-bg.png")); ?>') !important;
                                }
                            }
                        </style>
                        <div class="container">
                            <div class="four columns">
                                <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item"
                                     style="margin-bottom: 60px;">
                                    <div class="gdlr-skill-item-title gdlr-skin-title" style="font-size:30px">Fast
                                        Visitor Check In
                                    </div>
                                    <div class="gdlr-skill-item-dot"></div>
                                    <div class="gdlr-skill-item-wrapper"><img src="<?php echo e(asset('img/tracking.svg')); ?>" alt=""
                                                                              class="img-fluid"
                                                                              style="max-width: 100px;"></div>
                                    <div class="gdlr-skill-item-caption gdlr-skin-info" style="font-size:12px"><br>Fast
                                        and simple visitor registration.
                                    </div>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item"
                                     style="margin-bottom: 60px;">
                                    <div class="gdlr-skill-item-title gdlr-skin-title" style="font-size:30px">SMS
                                        Notification
                                    </div>
                                    <div class="gdlr-skill-item-dot"></div>
                                    <div class="gdlr-skill-item-wrapper"><img src="<?php echo e(asset('img/notify.svg')); ?>" alt=""
                                                                              class="img-fluid"
                                                                              style="max-width: 100px;"></div>
                                    <div class="gdlr-skill-item-caption gdlr-skin-info" style="font-size:12px"><br>Send
                                        Instant SMS notifications for scheduled appointments
                                    </div>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item"
                                     style="margin-bottom: 60px;">
                                    <div class="gdlr-skill-item-title gdlr-skin-title" style="font-size:30px">Issuing of
                                        Appointments
                                    </div>
                                    <div class="gdlr-skill-item-dot"></div>
                                    <div class="gdlr-skill-item-wrapper"><img src="<?php echo e(asset('img/appointment.svg')); ?>"
                                                                              alt="" class="img-fluid"
                                                                              style="max-width: 100px;"></div>
                                    <div class="gdlr-skill-item-caption gdlr-skin-info" style="font-size:12px"><br>Focus
                                        on what you do best, we handle all your appointments.
                                    </div>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </section>


                <!-- Sidebar With Content Section-->
                <div class="with-sidebar-wrapper">
                    <section id="content-section-2">
                        <div id="about-us"></div>
                        <div class="gdlr-parallax-wrapper   gdlr-show-all no-skin" data-bgspeed="0.25">
                            <div class="container">
                                <div class="one-fifth column"></div>
                                <div class="three-fifth columns">
                                    <div class="gdlr-item gdlr-about-us-item">
                                        <h3 class="about-us-title">AboutUs</h3>
                                        <div class="about-us-caption" style="color:#000">Looking for best partner for
                                            your Digital Journey?
                                        </div>
                                        <div class="about-us-divider"></div>
                                        <div class="about-us-content">
                                            <p>
                                                NeutronIT is a team of innovative and creative professionals who
                                                understand the need of customer focused solutions. With our experience
                                                you can trust us to provide you with high quality and secure software
                                                solutions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-fifth column"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>


                    <section id="content-section-7">
                        <div id="pricePlans"></div>
                        <div class="gdlr-color-wrapper  gdlr-show-all gdlr-skin-light-grey"
                             style="background-color: #f5f5f5; padding-top: 65px; padding-bottom: 45px; ">

                            <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="container" id="plan<?php echo e($product->id); ?>">
                                    <div class="gdlr-item gdlr-about-us-item">
                                        <h4 class="about-us-title"
                                            style="font-size:32px; color:#1081c9!important; text-transform: capitalize">
                                            <u style="color:#1081c9!important;">Product
                                                Plans(<?php echo e($product->title); ?>)</u></h4>
                                        <br>
                                    </div>
                                    <?php $__currentLoopData = $product->plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="four columns" style="padding-top: 0px;opacity: .8">
                                            <div class="gdlr-ux column-service-ux">
                                                <div class="gdlr-item gdlr-column-service-item gdlr-type-1"
                                                     style="margin-bottom: 30px;">
                                                    <div class="column-service-image"><img
                                                                src="<?php echo e(asset('custom/custom2/upload/icon-about-11.png')); ?>"
                                                                alt="" width="32px"
                                                                height="32px" style="max-width: 24px"/>
                                                    </div>
                                                    <div class="column-service-content-wrapper">
                                                        <h2 class="column-service-title"
                                                            style="font-size: 21px;text-shadow: 1px 1px #ddd;color: #f15c44"><?php echo e($plan->title); ?></h2>
                                                        <div class="small">
                                                            <span><b>PRICE : <span style="font-size: 16px;opacity: .6"><?php echo e($plan->pricing); ?> KES/<span
                                                                                style="text-transform: capitalize"><?php echo e($plan->period); ?></span></span></b></span>
                                                            <br><br>
                                                        </div>
                                                        <div class="column-service-content gdlr-skin-content">
                                                            <ul class="list-unstyled ul-check success mb-5"
                                                                style="list-style-image: url('img/checkmark_30px.png');">
                                                                <?php $__currentLoopData = explode(';',$plan->functionality); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $func): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(strlen($func)<1): ?>
                                                                        <?php continue; ?>;
                                                                    <?php endif; ?>
                                                                    <li>
                                                                        <div style="padding-top: 8px"><?php echo e($func); ?></div>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                        <?php if(strlen($plan->note)>1): ?>
                                                            <p>
                                                                <i><b>NB: </b><?php echo e($plan->note); ?></i>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>

                    


                    <section id="content-section-7">
                        <div class="gdlr-color-wrapper   " style="background-color: #ffffff; ">
                            <div class="container">
                                <div class="gdlr-item gdlr-about-us-item">
                                        <h4 class="about-us-title"
                                            style="font-size:36px; color:#1081c9!important; text-transform: capitalize">
                                           <u style="color:#1081c9!important;text-shadow: 1px 1px #ddd;" >Mission
                                               statement</u></h4>
                                        <br>
                                    <div>
                                        <blockquote>
                                            <p>&ldquo; To provide our customers with high quality IT solutions &rdquo;</p>
                                         </blockquote>
                                    </div>


                                </div>

                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>

                    <section id="content-section-7">
                        <div class="gdlr-color-wrapper   " style="background-color: #ffffff; ">
                            <div class="container">
                                <div class="gdlr-item gdlr-about-us-item">
                                    <h4 class="about-us-title"
                                        style="font-size:36px; color:#1081c9!important; text-transform: capitalize">
                                        <u style="color:#1081c9!important;text-shadow: 1px 1px #ddd;" >Vision
                                            statement</u></h4>
                                    <div style="font-size: 24px">


                                        <blockquote class="">
                                            <p >&ldquo; To be the best SaaS provider &rdquo;</p>
                                        </blockquote>
                                    </div>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php echo $__env->make('panels/landing-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("bottom-scripts"); ?>






    <script>
        (window.MSReady = window.MSReady || []).push(function ($) {

            "use strict";
            var masterslider_9c3d = new MasterSlider();

            // slider controls
            masterslider_9c3d.control('arrows', {
                autohide: true,
                overVideo: true
            });
            masterslider_9c3d.control('bullets', {
                autohide: false,
                overVideo: true,
                dir: 'h',
                align: 'bottom',
                space: 6,
                margin: 20
            });
            // slider setup
            masterslider_9c3d.setup("MS5c0e2bf129c3d", {
                width: 1140,
                height: 630,
                minHeight: 0,
                space: 0,
                start: 1,
                grabCursor: true,
                swipe: true,
                mouse: false,
                keyboard: false,
                layout: "fullwidth",
                wheel: false,
                autoplay: true,
                instantStartLayers: false,
                mobileBGVideo: false,
                loop: true,
                shuffle: false,
                preload: 0,
                heightLimit: true,
                autoHeight: false,
                smoothHeight: true,
                endPause: false,
                overPause: true,
                fillMode: "fill",
                centerControls: true,
                startOnAppear: false,
                layersMode: "center",
                autofillTarget: "",
                hideLayers: false,
                fullscreenMargin: 0,
                speed: 20,
                dir: "h",
                parallaxMode: 'swipe',
                view: "basic"
            });


            window.masterslider_instances = window.masterslider_instances || [];
            window.masterslider_instances.push(masterslider_9c3d);
        });
    </script>
    <script type='text/javascript'
            src='<?php echo e(asset('custom/custom2/plugins/masterslider/public/assets/js/masterslider.min.js')); ?>'></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("top-scripts"); ?>
    <script>
        var ms_grabbing_curosr = 'plugins/masterslider/public/assets/css/common/grabbing.html',
            ms_grab_curosr = 'plugins/masterslider/public/assets/css/common/grab.html';
    </script>
    <script type="text/javascript">
        (function (url) {
            if (/(?:Chrome\/26\.0\.1410\.63 Safari\/537\.31|WordfenceTestMonBot)/.test(navigator.userAgent)) {
                return;
            }
            var addEvent = function (evt, handler) {
                if (window.addEventListener) {
                    document.addEventListener(evt, handler, false);
                } else if (window.attachEvent) {
                    document.attachEvent('on' + evt, handler);
                }
            };
            var removeEvent = function (evt, handler) {
                if (window.removeEventListener) {
                    document.removeEventListener(evt, handler, false);
                } else if (window.detachEvent) {
                    document.detachEvent('on' + evt, handler);
                }
            };
            var evts = 'contextmenu dblclick drag dragend dragenter dragleave dragover dragstart drop keydown keypress keyup mousedown mousemove mouseout mouseover mouseup mousewheel scroll'.split(' ');
            var logHuman = function () {
                if (window.wfLogHumanRan) {
                    return;
                }
                window.wfLogHumanRan = true;
                var wfscr = document.createElement('script');
                wfscr.type = 'text/javascript';
                wfscr.async = true;
                wfscr.src = url + '&r=' + Math.random();
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(wfscr);
                for (var i = 0; i < evts.length; i++) {
                    removeEvent(evts[i], logHuman);
                }
            };
            for (var i = 0; i < evts.length; i++) {
                addEvent(evts[i], logHuman);
            }
        });


    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts/landing-layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/landing/index.blade.php ENDPATH**/ ?>