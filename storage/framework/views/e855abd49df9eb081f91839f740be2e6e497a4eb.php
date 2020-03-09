
<section id="data-list-view" class="data-list-view-header">
    
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data" style="overflow-y: scroll">
            <form method="POST" action="<?php echo e(route('create-organisations')); ?>">
                <?php echo csrf_field(); ?>
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h3 class="cs-text-shadow-white text-primary text-capitalize">Register new
                            organisation</h3>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x"></i>
                    </div>
                </div>
                <div class="data-items pb-3">
                    <div class="data-fields px-2 mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <?php echo csrf_field(); ?>
                                    <fieldset>
                                        <h5 class="brand-red pb-2">Company Details</h5>
                                        <div class="form-row">

                                            <div class="col form-group">
                                                <label for="title"><?php echo e(__('Title')); ?> <span
                                                            class="brand-blue">&ast;</span>
                                                </label>
                                                <input id="title" type="text"
                                                       class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                       name="title" value="<?php echo e(old('title')); ?>"
                                                       autocomplete="title"
                                                       autofocus
                                                       placeholder="Company/Event/organisation"
                                                       required>
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
                                                       name="tel" value="<?php echo e(old('tel')); ?>"
                                                       autocomplete="tel"
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
                                                   name="company_email"
                                                   value="<?php echo e(old('company_email')); ?>"
                                                   autocomplete="company_email" required>

                                            <small class="form-text text-muted pl-3"
                                                   style="text-transform: lowercase!important;">The confirmation
                                                url
                                                will be sent to this email
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
                                                <select id="industry" class="form-control"
                                                        name="industry">
                                                    <option>Select Industry</option>
                                                    <option value="Networking">Networking</option>
                                                    <option value="Fashion">Fashion</option>
                                                    <option value="Technology">Technology</option>
                                                    <option value="Chemicals">Chemicals</option>
                                                    <option value="Manufacturing">Manufacturing</option>
                                                </select>
                                            </div> <!-- form-group end.// -->

                                            <div class="col form-group">
                                                <label for="type"><?php echo e(__('Type')); ?> </label>
                                                <select id="type" class="form-control" name="type"
                                                        required>
                                                    <option value="Public"> Public
                                                    </option>
                                                    <option value="Self-Employed"> Self-Employed
                                                    </option>
                                                    <option value="Government"> Government Industry
                                                    </option>
                                                    <option value="Non-Profit"> Non-Profit
                                                    </option>
                                                    <option value="Sole Proprietorship"> Sole
                                                        Proprietorship
                                                    </option>
                                                    <option value="Privately held"> Privately held
                                                    </option>
                                                    <option value="Partnership"> Partnership
                                                </select>
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row end.// -->

                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input id="website" type="url"
                                                   class="form-control<?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"
                                                   name="website" value="<?php echo e(old('website')); ?>"
                                                   autocomplete="website"
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
                                                       name="city" value="<?php echo e(old('city')); ?>"
                                                       autocomplete="city"
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
                                                    <option value="Kenya" selected="selected">Kenya
                                                    </option>
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

                                        <div class="form-group">
                                            <label for="service"><?php echo e(__('Payment Service')); ?> <span
                                                        class="brand-blue">&ast;</span></label>
                                            <select id="service" class="form-control" name="service"
                                                    required>
                                                <option> Choose system service.</option>
                                                <option value="0">Basic Service</option>
                                                <option value="1" selected="selected">Enterprise
                                                </option>
                                                <option value="2">Corporate</option>
                                            </select>
                                        </div>


                                    </fieldset>

                                    <hr>
                                    <fieldset>
                                        <h5 class="brand-red pb-2 pt-3 text-underline"><u>Registerer Personal
                                                Details</u></h5>
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
                                            <input id="password" type="password"
                                                   class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   name="password" required autocomplete="new-password"
                                                   required>
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

                                        </div>
                                        <hr>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Complete Registration
                                            </button>
                                        </div> <!-- form-group// -->
                                    </fieldset>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</section><?php /**PATH C:\Techxers\Neutron\resources\views/panels/sidebar-register.blade.php ENDPATH**/ ?>