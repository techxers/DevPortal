<section id="data-list-view" class="data-list-view-header">
    
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <?php
            $service=\App\Subscription::where('organisation_id', $organisation->id)->get()[0];
        $countS=0;
        ?>
        <div class="add-new-data" style="overflow-y: scroll">
            <div class="mt-3 pr-2 pl-2">
                <h1 class="cs-text-shadow-white text-center mb-2 card-title"
                    style="color: #4285f4;font-size: 24px">Renew Your Subscription</h1>

                <form method="POST" action="javascript:void(0)" id="registerForm" name="registerForm">
                    <?php echo csrf_field(); ?>
                    <fieldset>
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
                            <div class="row ">
                                <div class="col-md-6 p-0">
                                    <div class="">
                                        <h6 class="small">Select Products</h6>
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

                                <div class="col-md-6 p-0">
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
                                                        <td class="text-capitalize"><?php echo e($plan->pricing); ?></td>
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
                                        <h6 class="text-md-center small"><u>Total Payment</u></h6>
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



                        <div class="">
                            <h5 class="">Select Payment Method</h5>
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <input type="radio" name="payment" checked>
                                    <img src="<?php echo e(asset("img/home/mastercard.svg")); ?>"
                                         class="w-100"
                                         style="max-width: 36px">

                                </div>
                                <div class="col-4">
                                    <input type="radio" name="payment">
                                    <img src="<?php echo e(asset("img/home/visa.svg")); ?>"
                                         class="w-100"
                                         style="max-width: 36px">

                                </div>
                                <div class="col-4">

                                    <input type="radio" name="payment">
                                    <img src="<?php echo e(asset("img/home/mpesa.svg")); ?>"
                                         class="w-100"
                                         style="max-width: 48px">
                                </div>
                            </div>
                            <div class="border mb-2 mt-2 p-1">
                                <section class="">
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
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary btn-block" type="submit">Complete Transaction</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    
</section>

<?php /**PATH C:\wamp64\www\code\Neutron\resources\views/panels/sidebar-subscribe.blade.php ENDPATH**/ ?>