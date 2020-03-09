<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-xl-2">
                <div class="navbar-wrapper mb-0 site-logo">
                    <a class="navbar-brannd" href="/">
                        <div style="position: absolute;top: -28px;">
                            <img src="<?php echo e(asset('img/brand/logo-tiny.png')); ?>" class="w-100" style="max-width: 172px;">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="#home-section" class="nav-link">Home</a></li>
                        <li class="has-children">
                            <a href="#about-section" class="nav-link">System</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo e(route('register')); ?>"class="nav-link">Register(Lease)</a></li>
                                <li><a href="#pricing-section" class="nav-link">Pricing</a></li>
                                <li><a href="#gallery-section" class="nav-link">How it works</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#about-section" class="nav-link">Support</a>
                            <ul class="dropdown">
                                <li><a href="#" class="nav-link">Downloads</a></li>
                                <li><a href="#" class="nav-link">Frequently Asked Questions(FAQ)</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#contact-section" class="nav-link">Contact us</a></li>
                        <li class="portal-btn"><a href="<?php echo e(route('login')); ?>"
                                                                                         class="nav-link"
                                                                                         style="color: white!important;">|
                                VSM Portal <i
                                        class="icon-users"></i></a></li>

                    </ul>
                </nav>
            </div>


            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle float-right"><span
                            class="icon-menu h3"></span></a></div>

        </div>
    </div>

</header><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/layouts/navbar-landing.blade.php ENDPATH**/ ?>