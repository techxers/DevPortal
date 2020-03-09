
    @extends('layouts/landing-layoutMaster')

    @section("page-styles")
        <link rel="stylesheet" href="{{asset('landing-page/css/animate.min.css')}}">
    @endsection

    @section('content')
        @include('panels/landing-navbar')


        <!-- Above Sidebar Section-->

        <!-- Sidebar With Content Section-->
        <div class="with-sidebar-wrapper">
            <section id="content-section-1">
                <div class="gdlr-parallax-wrapper gdlr-background-image gdlr-show-all gdlr-skin-dark-skin" id="gdlr-parallax-wrapper-1" data-bgspeed="0" style="background-image: url('{{asset('img/parallax-bg.png')}}'); padding-top: 160px; padding-bottom: 100px; ">
                    <div class="container">
                        <div class="gdlr-title-item">
                            <div class="gdlr-item-title-wrapper gdlr-item  gdlr-center-divider gdlr-large ">
                                <div class="gdlr-item-title-head">
                                    <h3 class="gdlr-item-title gdlr-skin-title gdlr-skin-border">Our Presence</h3></div>
                                <div class="gdlr-item-title-caption gdlr-skin-info">Why Neutron</div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </section>










            <section id="content-section-3">
                <div class="gdlr-color-wrapper  gdlr-show-all no-skin" id="jobs-title" style="background-color: #ffffff; padding-top: 65px; padding-bottom: 25px; ">
                    <div class="container">
                        <div class="gdlr-title-item" style="margin-bottom: 50px;">
                            <div class="gdlr-item-title-wrapper gdlr-item  gdlr-left gdlr-medium ">
                                <div class="gdlr-item-title-head">
                                    <h3 class="gdlr-item-head gdlr-skin-title gdlr-skin-border" align="center">No matter where your business operates in the world,</h3><br>
                                    <h6 align="center">Neutron System is there to help you take advantage of our wide range of software and services designed to fit your needs.</h6>
                                </div>

                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="three columns">

                            <div class="gdlr-ux column-service-ux">
                                <div class="gdlr-item gdlr-column-service-item gdlr-type-1" style="margin-bottom: 10px;">
                                    <div class="column-service-content-wrapper">

                                        <img src="{{asset('img/town.svg')}}"  class="w-100" style="max-width: 200px" >


                                    </div>
                                </div>
                            </div>
                            <!------------------------Sourcing and Procurement ------------------------>



                        </div>


                        <!--------------------------Intelligent------------------------------->

                        <div class="three columns">

                            <div class="gdlr-ux column-service-ux">
                                <div class="gdlr-item gdlr-column-service-item gdlr-type-1" style="margin-bottom: 10px;">
                                    <div class="column-service-content-wrapper">
                                        <h3 class="column-service-title" style="color:#007dc5"> Kenya Office    </h3>

                                        <p> TechXpress Office, Nairobi, Kenya </p>
                                        <div class="gdlr-text-block"><i class="fa fa-clock-o"></i>Mon - Fri : 04:00 - 16:00</div><br><br>
                                        <div class="gdlr-text-block"><i class="fa fa-envelope"></i>info@neutronit.co.ke</div> <br><br>
                                        <div class="gdlr-text-block"><i class="fa fa-phone"></i>+254712345678/ 79999999</div><br>
                                        <p></p>

                                    </div>
                                </div>
                            </div>
                            <!------------------------Sourcing and Procurement ------------------------>



                        </div>





                        <!------------------------------------------------------>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </section>



















            s














            <!-- Sidebar With Content Section-->
            <div class="with-sidebar-wrapper">



                <div class="clear"></div>

                <br><br>





        @include('panels/landing-footer')
    @endsection


    @section("bottom-scripts")






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
    @endsection

    @section("top-scripts")
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
    @endsection


