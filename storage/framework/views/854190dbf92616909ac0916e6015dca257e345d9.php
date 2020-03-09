<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Neutron | Register</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="<?php echo e(asset('custom/custom3/css.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('custom/custom3/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('custom/custom3/sweetalert.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('custom/custom3/custom.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('fonts/font-awesome/5.12/css/all.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('fonts/font-awesome/css/font-awesome.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('custom/nt-styles.css')); ?>">


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

            <div class="login-header">
                <div class="brand">
                    <a href="<?php echo e(route('landing')); ?>">
                        <img src="<?php echo e(asset('img/logo-landing.png')); ?>" class="w-100" style="max-width: 150px">
                    </a>
                </div>
                <div class="icon">
                    <a href="<?php echo e(route('login')); ?>" style="text-decoration: none;color:lightgrey"><i class="fa fa-sign-in"></i></a>
                </div>
            </div>

            <div class="register-content">
                <?php if(session('status')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('register')); ?>"
                      class="" id="registerForm" name="registerForm">
                    <?php echo csrf_field(); ?>
                    <br><br>
                    <hr>
                    <fieldset class="">
                        <legend class="brand-blue pb-2"><h5 style="font-size: 24px">Company Information</h5></legend>
                        <div class="form-row">

                            <div class="col form-group">
                                <label for="title"><?php echo e(__('Title')); ?> <span
                                            class="brand-blue">&ast;</span>
                                </label>
                                <input id="title" type="text"
                                       class="text-capitalize form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
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
                                       placeholder="Company phone number" required>
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
                                   class="text-lowercase form-control<?php echo e($errors->has('company_email') ? ' is-invalid' : ''); ?>"
                                   name="company_email" value="<?php echo e(old('company_email')); ?>"
                                   autocomplete="company_email" placeholder="Company email address"
                                   required>

                            <small class="form-text text-muted pl-3"
                                   style="text-transform: lowercase!important;color: rgba(0,0,0,0.7)!important;">
                                We'll never share
                                your email
                                with anyone
                                else.
                            </small>

                            <?php if($errors->has('company_email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('company_email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div> <!-- form-group end.// -->

                        <div>
                            <h5 class="brand-red pb-2">Company Type</h5>
                            <div class="form-row">

                                <div class="col form-group">
                                    <label for="industry"><?php echo e(__('Industry')); ?> <span
                                                class="brand-blue">&ast;</span></label>
                                    <select id="industry" class="form-control" name="industry"
                                            required>
                                        <option class="" value="">Select Industry</option>
                                        <?php $__currentLoopData = \App\IndustryType::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->type); ?>"><?php echo e($type->type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div> <!-- form-group end.// -->

                                <div class="col form-group">
                                    <label for="type"><?php echo e(__('Type')); ?> </label>
                                    <select id="type" class="form-control" name="type">
                                        <option value="Public" selected="">Public</option>
                                        <option value="Self-Employed">Self-Employed</option>
                                        <option value="Non-Profit">Non-Profit</option>
                                        <option value="Sole-Proprietorship">Sole Proprietorship
                                        </option>
                                        <option value="Private">Private</option>
                                        <option value="PrivatePartnership">Partnership</option>
                                    </select>

                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->

                            <div class="form-group">
                                <label for="website">Website</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"
                                         style="border-radius: 0%!important;">
                                                            <span class="input-group-text"
                                                                  id="basic-addon1">http://</span>
                                    </div>
                                    <input id="website" type="text"
                                           class="form-control<?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"
                                           name="website" value="<?php echo e(old('website')); ?>"
                                           autocomplete="website"
                                           autofocus
                                           placeholder="Begin with www. or plain text">
                                    <?php if($errors->has('website')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('website')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>


                            </div> <!-- form-group end.// -->

                        </div>

                        <div>
                            <h5 class="brand-red pb-2">Physical Address</h5>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="city"><?php echo e(__('City')); ?> <span
                                                class="brand-blue">&ast;</span></label>
                                    <input id="city" type="text"
                                           class="text-capitalize form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>"
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
                                    <select id="country" class="form-control" name="country"
                                            required>
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
                                       name="postcode" value="<?php echo e(old('postcode')); ?>"
                                       autocomplete="postcode"
                                       placeholder="P.O BOX 123...">
                                <?php if($errors->has('postcode')): ?>
                                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('postcode')); ?></strong>
                                        </span>
                                <?php endif; ?>

                            </div> <!-- form-group end.// -->
                        </div>
                    </fieldset>

                    <br><br>
                    <hr>
                    <fieldset>

                        <legend class="brand-blue pb-2">
                            <h5 style="font-size: 24px">Subscribe to a service</h5></legend>

                        <div class="form-group">
                            <div class="cs-hidden">
                                <input type="number" value="<?php echo e(\App\Product::all()->count()); ?>" name="productCount">
                            </div>
                            <?php
                                $pkgIndex=-1;
                            ?>
                            <?php
                                $indexTrack1=-1;
                            ?>
                            <div class="row pt-3 ">
                                <div class="col-md-5">
                                    <div class="pl-1">
                                        <h5 class="">Select Products</h5>
                                        <table class="table table-responsive table-borderless">
                                            <tbody class="pkgs">
                                            <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $indexTrack1++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="productSelect"
                                                               name="product<?php echo e($indexTrack1); ?>" id="<?php echo e($product->id); ?>"
                                                               value="<?php echo e($product->id); ?>">
                                                    </td>
                                                    <td class="pl-2"><?php echo e($product->title); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-7 p-0">
                                    <?php
                                        $indexTrack1=-1;
                                    ?>

                                    <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $indexTrack1++;
                                        ?>
                                        <div class="productPlans">
                                            <h6 class="text-md-center"><u><?php echo e($product->title); ?> Plans</u></h6>
                                            <table class="table w-100 table-borderless">
                                                <thead>
                                                <tr>
                                                    <td></td>
                                                    <th>Plan</th>
                                                    <th>Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $product->plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="plan_product<?php echo e($indexTrack1); ?>"
                                                                   value="<?php echo e($plan->id."=".$plan->pricing); ?>"
                                                                   <?php if(($plan->title)==='Basic'): ?>  checked
                                                                   <?php endif; ?> class="plan_select">
                                                        </td>
                                                        <td class=""><?php echo e($plan->title); ?></td>
                                                        <td class="text-capitalize"><?php echo e($plan->pricing." / ".$plan->period); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cs-hidden">
                                        <input type="text" name="regProducts" id="regProducts"  required>
                                        <input type="text" name="regPlans" id="regPlans"  required>
                                        <input type="number" name="regTotalPayee" id="regTotalPayee" value="0">
                                    </div>

                                    <div class="">
                                        <h6 class="text-md-center"><u>Total Payment</u></h6>
                                        <table class="table table-borderless">

                                            <tbody>
                                            <tr>
                                                <td class="text-right">Kshs.</td>
                                                <td class=""><b id="totalPayment">00.00</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <br>
                        <div class="">
                            <div class="">
                                <h5 class="">Select Payment Method</h5>
                            </div>
                            <div class="row text-center center">
                                <div class="col-4">
                                    <input type="radio" name="payment" class="pay-check" title="0"
                                           checked>
                                    <img src="<?php echo e(asset("img/home/mastercard.svg")); ?>"
                                         class="w-100"
                                         style="max-width: 36px">

                                </div>
                                <div class="col-4">
                                    <input type="radio" name="payment" class="pay-check" title="1">
                                    <img src="<?php echo e(asset("img/home/visa.svg")); ?>"
                                         class="w-100"
                                         style="max-width: 36px">

                                </div>
                                <div class="col-4">

                                    <input type="radio" name="payment" class="pay-check" title="2">
                                    <img src="<?php echo e(asset("img/home/mpesa.svg")); ?>"
                                         class="w-100"
                                         style="max-width: 48px">
                                </div>
                            </div>
                            <div class="border p-2 mb-2 mt-2">
                                <section class="pay-mt pr-3 pl-3">
                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="First Name"><?php echo e(__('First Name')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span>
                                            </label>
                                            <input id="First Name" type="text"
                                                   class="form-control"
                                                   name="fNameCredit" value=""
                                                   autocomplete="First Name"
                                                   autofocus
                                                   placeholder="">
                                        </div> <!-- form-group end.// -->

                                        <div class="col form-group">
                                            <label for="Last Name"><?php echo e(__('Last Name')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span></label>
                                            <input id="Last Name" type="text"
                                                   class="form-control"
                                                   name="lNameCredit" value=""
                                                   autocomplete="Last Name"
                                                   placeholder="">
                                        </div> <!-- form-group end.// -->
                                    </div>

                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="Credit Card Number"><?php echo e(__('Credit Card Number')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span>
                                            </label>
                                            <input id="Credit Card Number"
                                                   type="number"
                                                   class="form-control"
                                                   name="Credit Card Number"
                                                   value=""
                                                   autocomplete="Credit Card Number"
                                                   autofocus
                                                   placeholder="">
                                        </div> <!-- form-group end.// -->

                                        <div class="col-md form-group">
                                            <label for="secCode"><?php echo e(__('Security Code')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span></label>
                                            <input id="secCode"
                                                   type="number"
                                                   class="form-control"
                                                   name="secCode"
                                                   value=""
                                                   placeholder=""
                                                   style="width: 50%">

                                        </div> <!-- form-group end.// -->
                                    </div>

                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="Expiration Month"><?php echo e(__('Expiration Month')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span>
                                            </label>
                                            <select class="form-dropdown form-control"
                                                    name="expMonthCredit"
                                                    data-component="cc_exp_month">
                                                <option></option>
                                                <option value="January"> January
                                                </option>
                                                <option value="February">
                                                    February
                                                </option>
                                                <option value="March"> March
                                                </option>
                                                <option value="April"> April
                                                </option>
                                                <option value="May"> May
                                                </option>
                                                <option value="June"> June
                                                </option>
                                                <option value="July"> July
                                                </option>
                                                <option value="August"> August
                                                </option>
                                                <option value="September">
                                                    September
                                                </option>
                                                <option value="October"> October
                                                </option>
                                                <option value="November">
                                                    November
                                                </option>
                                                <option value="December">
                                                    December
                                                </option>
                                            </select>
                                        </div> <!-- form-group end.// -->

                                        <div class="col form-group">
                                            <label for="Expiration Year"><?php echo e(__('Expiration Year')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span></label>


                                            <select class="form-dropdown form-control"
                                                    name="expYear"

                                                    data-component="cc_exp_year">
                                                <option></option>
                                                <option value="2020"> 2020
                                                </option>
                                                <option value="2021"> 2021
                                                </option>
                                                <option value="2022"> 2022
                                                </option>
                                                <option value="2023"> 2023
                                                </option>
                                                <option value="2024"> 2024
                                                </option>
                                                <option value="2025"> 2025
                                                </option>
                                                <option value="2026"> 2026
                                                </option>
                                                <option value="2027"> 2027
                                                </option>
                                                <option value="2028"> 2028
                                                </option>
                                                <option value="2029"> 2029
                                                </option>
                                            </select>
                                        </div> <!-- form-group end.// -->
                                    </div>
                                </section>
                                <section class="pay-mt pr-3 pl-3" style="display: none">


                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="Credit Card Number"><?php echo e(__('Credit Card Number')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span>
                                            </label>
                                            <input id="Credit Card Number"
                                                   type="number"
                                                   class="form-control"
                                                   name="Credit Card Number"
                                                   value=""
                                                   autocomplete="Credit Card Number"
                                                   autofocus
                                                   placeholder="">
                                        </div> <!-- form-group end.// -->
                                    </div>

                                    <div class="form-row">

                                        <div class="col form-group">
                                            <label for="Expiration Month"><?php echo e(__('Expiration Month')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span>
                                            </label>
                                            <select class="form-dropdown form-control"
                                                    name="expMonthCredit"
                                                    data-component="cc_exp_month">
                                                <option></option>
                                                <option value="January"> January
                                                </option>
                                                <option value="February">
                                                    February
                                                </option>
                                                <option value="March"> March
                                                </option>
                                                <option value="April"> April
                                                </option>
                                                <option value="May"> May
                                                </option>
                                                <option value="June"> June
                                                </option>
                                                <option value="July"> July
                                                </option>
                                                <option value="August"> August
                                                </option>
                                                <option value="September">
                                                    September
                                                </option>
                                                <option value="October"> October
                                                </option>
                                                <option value="November">
                                                    November
                                                </option>
                                                <option value="December">
                                                    December
                                                </option>
                                            </select>
                                        </div> <!-- form-group end.// -->

                                        <div class="col form-group">
                                            <label for="Expiration Year"><?php echo e(__('Expiration Year')); ?>

                                                <span
                                                        class="brand-blue">&ast;</span></label>


                                            <select class="form-dropdown form-control"
                                                    name="expYear"

                                                    data-component="cc_exp_year">
                                                <option></option>
                                                <option value="2020"> 2020
                                                </option>
                                                <option value="2021"> 2021
                                                </option>
                                                <option value="2022"> 2022
                                                </option>
                                                <option value="2023"> 2023
                                                </option>
                                                <option value="2024"> 2024
                                                </option>
                                                <option value="2025"> 2025
                                                </option>
                                                <option value="2026"> 2026
                                                </option>
                                                <option value="2027"> 2027
                                                </option>
                                                <option value="2028"> 2028
                                                </option>
                                                <option value="2029"> 2029
                                                </option>
                                            </select>
                                        </div> <!-- form-group end.// -->
                                    </div>
                                </section>
                                <section class="pay-mt pr-3 pl-3" style="display: none">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                                    aspernatur earum enim quo quod repellat sed similique tempore
                                    unde vel? Ad consectetur corporis distinctio esse facilis illo
                                    iusto nostrum quae.
                                </section>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Step 3 -->
                    <br><br>
                    <hr>
                    <fieldset>
                        <legend class="brand-blue pb-2"><h5 style="font-size: 24px">User Information</h5></legend>

                        <div class="form-group brand-red">
                            <p style="text-shadow: 1px 1px 0 #e5e5e5;color: #dd5047">
                                Filling this form you verify that you are an authorized representative
                                of this organisation
                                and
                                have
                                the
                                right to act on its behalf in the creation and management of this
                                page. The
                                organisation and you agree to the additional terms for Pages.
                            </p>
                            
                            <div class="">
                                <h5 class="brand-red pb-2 pt-3 text-underline"><u>Please Fill your
                                        personal
                                        details</u></h5>
                                <div class="form-row">

                                    <div class="col form-group">
                                        <label for="name"><?php echo e(__('Fullname')); ?></label>
                                        <input type="text" name="name" id="name"
                                               class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                               value="<?php echo e(old('name')); ?>" autocomplete="name"
                                               placeholder="First & Second Name" required max="30"
                                               pattern="[A-Z][A-Za-z+0-9+']*[ ][A-Z][A-Za-z+0-9+']*"
                                               title="Two names start with capital letter"
                                        >
                                    </div> <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label for="email"><?php echo e(__('Email')); ?></label>
                                        <input id="email" type="email" placeholder="Email will be used for login"
                                               class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?> text-lowercase"
                                               name="email" value="<?php echo e(old('email')); ?>"
                                               autocomplete="email"
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
                                    <input id="password" type="password" placeholder="Enter password"
                                           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="password" autocomplete="new-password"
                                           required data-validation-required-message="This field is required"
                                           pattern="[A-Za-z][A-Za-z+0-9]{6}[A-Za-z+0-9]*[0-9][A-Za-z+0-9]*"
                                           title="Should cointain letters(Both upper &amp; lower case) numbers and no special characters and atleast more than 6 characters">
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
                                    <input id="password-confirm" type="password"
                                           class="form-control" placeholder="Confirm password"
                                           name="password_confirmation" autocomplete="new-password"
                                           required data-validation-match-match="password"
                                           data-validation-required-message="Repeat password must match"
                                           pattern="[A-Za-z][A-Za-z+0-9]{6}[A-Za-z+0-9]*[0-9][A-Za-z+0-9]*"
                                           title="Should cointain letters(Both upper &amp; lower case) numbers and no special characters and atleast more than 6 characters">

                                </div><!-- form-group end.// -->

                            </div>
                        </div>
                    </fieldset>

                    <br>
                    <div class="register-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn-signup">Complete
                            Registration
                        </button>
                    </div>

                    <div class="m-t-30 m-b-30 p-b-30">
                        Already registered? Click <a href="<?php echo e(route('login')); ?>">here</a> to login.
                    </div>
                    <hr>
                    <p class="text-center text-grey-darker mb-0">
                        © 2020 neutronit.com | Powered by Neutron IT
                    </p>
                </form>
            </div>
            <!-- end register-content -->

        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->

</div>
<!-- end page container -->
<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo e(asset('custom/custom3/jquery.js')); ?>"></script>

<script src="<?php echo e(asset('custom/custom3/bootstrap.js')); ?>"></script>

<script src="<?php echo e(asset('custom/custom3/default.js')); ?>"></script>
<script src="<?php echo e(asset('custom/custom3/sweetalert.js')); ?>"></script>
<!-- ================== END BASE JS ================== -->


<script src="<?php echo e(asset('custom/custom3/jqueryval')); ?>"></script>


<script src="<?php echo e(asset('vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>

<script>
    var payMethods = document.getElementsByClassName("pay-mt");
    $(".pay-check").change(function () {

        for (var i = 0; i < payMethods.length; i++) {
            payMethods[i].style.display = "none";
        }
        payMethods[this.title].style.display = "block";
    });


    var pkgs = document.getElementsByClassName('pkgs');
    for (var i = 0; i < pkgs.length; i++) {
        pkgs[i].style.display = "none";
    }
    pkgs[0].style.display = "block";

    $("#service").change(function () {
        for (var i = 0; i < pkgs.length; i++) {
            pkgs[i].style.display = "none";
        }
        var v = (this.value) - 1;
        pkgs[v].style.display = "block";
    });


    /***********************dealing with product selection**********************/
    var productsPlans = document.getElementsByClassName('productPlans');
    var products = document.getElementsByClassName('productSelect');
    var formReference = document.forms["registerForm"];
    var total = 0;
    for (var x = 0; x < productsPlans.length; x++) {
        productsPlans[x].style.display = "none";
    }
    $(".productSelect").change(function () {
        for (var x = 0; x < products.length; x++) {
            if (products[x].checked) {
                productsPlans[x].style.display = "block";

            } else {
                productsPlans[x].style.display = "none";
            }
        }
        calculateTotal();
    });
    $(".plan_select").change(function () {
        calculateTotal();
    });

    function calculateTotal() {
        total = 0;
        for (var x = 0; x < products.length; x++) {
            if (products[x].checked)
                total += parseInt(formReference['plan_product' + x].value.split("=")[1]);
        }
        document.getElementById("totalPayment").innerHTML = total;
        formReference['regTotalPayee'].value=total;
        collectProducts();
    }

    function collectProducts() {
        var outProducts="", outPlans="";
        for (var x = 0; x < products.length; x++) {
            if (products[x].checked) {
                outProducts += products[x].value + "%";
                outPlans += formReference['plan_product' + x].value.split("=")[0]+"%";
            }
        }
        formReference['regProducts'].value=outProducts;
        formReference['regPlans'].value=outPlans;
    }
</script>

</body>
</html><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/auth/register.blade.php ENDPATH**/ ?>