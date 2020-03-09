<?php $__env->startSection('title', 'Reactivate Account'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/charts/apexcharts.css')); ?>">
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('custom/nt-styles.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/dashboard-ecommerce.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/card-analytics.css')); ?>">
    <style>
        .dashboard-bg {
            position: absolute;
            left: 0;
            right: 0;
            min-height: 500px;
            background-image: url(<?php echo e(asset('img/theme/summary2bg.png')); ?>);
            background-size: contain;
            background-position: center top;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>

    <div class="pt-2 pb-2">
        <h1 class="text-red">Your account has been disabled</h1>
        <div class="d-flex justify-content-between w-25 pt-2 pb-2 ">
            <h4 class="text-muted">Reason</h4>
            <p><?php echo e($organisation->disable_reason); ?></p>
        </div>
    </div>
    <?php
        $service=\App\Subscription::where('organisation_id', $organisation->id)->get()[0];
    $countS=0;
    ?>
</section>
    <section>
        <form method="POST" action=""
              class="" id="registerForm" name="registerForm">


            <fieldset>

                <legend class="brand-blue pb-2">
                    <h5 style="font-size: 24px" class="text-blue">Renew Your Subs</h5></legend>

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


            <br>
            <div class="register-buttons">
                <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn-signup">Complete
                    Registration
                </button>
            </div>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('vendors/js/charts/apexcharts.min.js')); ?>"></script>

    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/pages/dashboard-ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/recover-account.blade.php ENDPATH**/ ?>