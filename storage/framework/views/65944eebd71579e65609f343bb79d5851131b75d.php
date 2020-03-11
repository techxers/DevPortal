
<section id="data-list-view" class="data-list-view-header">
    
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data p-2" style="overflow-y: scroll">
            <form method="POST" action="<?php echo e(route('create-organisations')); ?>"
                  class="" id="registerForm" name="registerForm">
                <?php echo csrf_field(); ?>

                <br>
                <h3 class="cs-text-shadow-white text-primary text-capitalize text-center">Register new
                    organisation</h3>
                <hr>
                <br>
                <fieldset class="">
                    <div class="form-row">

                        <div class="col form-group">
                            <label for="title"><?php echo e(__('Title')); ?> <span
                                        class="brand-blue">&ast;</span>
                            </label>
                            <input id="title" type="text"
                                   class="border text-capitalize form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
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
                                   class="border form-control<?php echo e($errors->has('tel') ? ' is-invalid' : ''); ?>"
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
                               class="text-lowercase border form-control<?php echo e($errors->has('company_email') ? ' is-invalid' : ''); ?>"
                               name="company_email" value="<?php echo e(old('company_email')); ?>"
                               autocomplete="company_email" placeholder="Company email address"
                               required>

                        <small class="form-text text-muted pl-3"
                               style="text-transform: lowercase!important;color: rgba(0,0,0,0.7)!important;">
                           This should be the company's email address
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
                                <select id="industry" class="form-control border" name="industry"
                                        required>
                                    <option class="" value="">Select Industry</option>
                                    <?php $__currentLoopData = \App\IndustryType::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->type); ?>"><?php echo e($type->type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div> <!-- form-group end.// -->

                            <div class="col form-group">
                                <label for="type"><?php echo e(__('Type')); ?> </label>
                                <select id="type" class="form-control border" name="type">
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
                                       class="border form-control<?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"
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
                                       class="border text-capitalize form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>"
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
                                <select id="country" class=" border form-control" name="country"
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
                                   class="border form-control<?php echo e($errors->has('postcode') ? ' is-invalid' : ''); ?>"
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
                        <div class="row pt-1 ">
                            <div class="col-md-5 p-0">
                                <div class="pl-1">
                                    <h5 class="small">Select Products</h5>
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


                <!-- Step 3 -->
                <hr>
                <fieldset>
                    <legend class="brand-blue pb-2"><h5 style="font-size: 24px">User Information</h5></legend>

                    <div class="form-group brand-red">
                        <p style="text-shadow: 1px 1px 0 #e5e5e5;color: #dd5047">
                            The below data are for the person who will be representing the organisation/its admin.
                        </p>

                        <div class="">
                            <h5 class="brand-red pb-2 pt-1 text-underline"><u>Please Fill your
                                    personal
                                    details</u></h5>
                            <div class="form-row">

                                <div class="col form-group">
                                    <label for="name"><?php echo e(__('Fullname')); ?></label>
                                    <input type="text" name="name" id="name"
                                           class="border form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                           value="<?php echo e(old('name')); ?>" autocomplete="name"
                                           placeholder="First & Second Name" required max="30"
                                           pattern="[A-Z][A-Za-z+0-9+']*[ ][A-Z][A-Za-z+0-9+']*"
                                           title="Two names start with capital letter"
                                    >
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label for="email"><?php echo e(__('Email')); ?></label>
                                    <input id="email" type="email" placeholder="Email will be used for login"
                                           class="border form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?> text-lowercase"
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
                                       class="border form-control <?php $__errorArgs = ['password'];
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
                                       class="border form-control" placeholder="Confirm password"
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

            </form>
        </div>
    </div>
    
</section><?php /**PATH C:\wamp64\www\code\DevPortal\resources\views/panels/sidebar-register.blade.php ENDPATH**/ ?>