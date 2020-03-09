    

    <?php $__env->startSection("page-styles"); ?>
        <link rel="stylesheet" href="<?php echo e(asset('landing-page/css/animate.min.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('panels/landing-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content-wrapper">
            <div class="gdlr-content">

                <!-- Above Sidebar Section-->

                <!-- Sidebar With Content Section-->
                <div class="with-sidebar-wrapper">
                    <section id="content-section-1">
                        <div class="gdlr-parallax-wrapper gdlr-background-image gdlr-show-all gdlr-skin-dark-skin" id="gdlr-parallax-wrapper-1" data-bgspeed="0" style="background-image: url('<?php echo e(asset('img/parallax-bg.png')); ?>'); padding-top: 160px; padding-bottom: 100px; ">
                            <div class="container">
                                <div class="gdlr-title-item">
                                    <div class="gdlr-item-title-wrapper gdlr-item  gdlr-center-divider gdlr-large ">
                                        <div class="gdlr-item-title-head">
                                            <h3 class="gdlr-item-title gdlr-skin-title gdlr-skin-border">Contact us</h3></div>
                                        <div class="gdlr-item-title-caption gdlr-skin-info">Why Neutron</div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>









                    <!-- Sidebar With Content Section-->
                    <div class="with-sidebar-wrapper">
                        <div class="with-sidebar-container container">
                            <div class="with-sidebar-left twelve columns">
                                <div class="with-sidebar-content eight columns">
                                    <section id="content-section-1">
                                        <div class="section-container container">
                                            <div class="gdlr-item gdlr-content-item" style="margin-bottom: 60px;">
                                                <p>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: -22px;"></div>
                                                <h5 class="gdlr-heading-shortcode " style="font-weight: bold;">Please fulfil the form below.</h5>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 25px;"></div>
                                                <div role="form" class="wpcf7" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    <form action="mailto:youremail@neutrontechnologies.co.ke" method="post" enctype="text/plain" class="wpcf7-form" >
                                                        <div style="display: none;">
                                                            <input type="hidden" name="_wpcf7" value="5" />
                                                            <input type="hidden" name="_wpcf7_version" value="5.0.5" />
                                                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f5-o1" />
                                                            <input type="hidden" name="_wpcf7_container_post" value="0" />
                                                        </div>
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap placeholder"><input required type="text" name="name" placeholder="Name*" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </p>
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap placeholder"><input required type="email" name="email" placeholder="Email*" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </p>
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap placeholder"><input required type="text" name="subject" placeholder="Subject*" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span> </p>
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap placeholder"><textarea required type="text" name="message" placeholder="message"  cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
                                                        <p>
                                                            <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" />
                                                        </p>
                                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </section>
                                </div>

                                <div class="gdlr-sidebar gdlr-left-sidebar four columns">
                                    <div class="gdlr-item-start-content sidebar-left-item">
                                        <div id="text-6" class="widget widget_text gdlr-item gdlr-widget">
                                            <h3 class="gdlr-widget-title">  Contacting Us</h3>

                                        </div>
                                        <div id="text-7" class="widget widget_text gdlr-item gdlr-widget">
                                            <h3 class="gdlr-widget-title">Kenya</h3>
                                            <div class="clear"></div>
                                            <div class="textwidget">
                                                <p>TechXpress Office, Nairobi, Kenya</p>
                                                <p><i class="gdlr-icon fa fa-phone" style="color: #444444; font-size: 16px; "></i> +254711614733/ +254724282358</p>
                                                <p><i class="gdlr-icon fa fa-envelope" style="color: #444444; font-size: 16px; "></i> info@neutronit.co.ke</p>
                                                <p><i class="gdlr-icon fa fa-clock-o" style="color: #444444; font-size: 16px; "></i> Everyday 8:00-16:00</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>

                    <!-- Below Sidebar Section-->


                </div>
                <!-- gdlr-content -->
                <div class="clear"></div>
            </div>
        </div>
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
                src='/custom/custom2/plugins/masterslider/public/assets/js/masterslider.min.js'></script>
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



<?php echo $__env->make('layouts/landing-layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/panels/landing-contact.blade.php ENDPATH**/ ?>