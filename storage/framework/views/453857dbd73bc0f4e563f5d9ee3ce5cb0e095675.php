<?php $__env->startSection('title','Staffs Management'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link href="<?php echo e(asset('css/custom/argon-dashboard/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- Header -->
    



    <div class="row" style="margin: 64px 1px"></div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-sm-3 mb-5 mb-xl-0">
                <div class="d-flex justify-content-between align-items-baseline mb-4 pl-2 mr--3 mt-2">
                    <div class="d-flex  ">
                                            <span style="font-size: 28px;"
                                                  class="cs-text-shadow-white">Staff (<?php echo e($usersOfOrg->count()-1); ?>)</span>
                    </div>

                    <a href="#inlineForm" data-toggle="modal" class="btn-primary pl-2 pr-2 mr-2 shadow--hover">
                        <span style="font-size: 20px;padding: 1px 3px"><b>+</b></span>
                    </a>



                </div>
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel33">Add a new user for this organisation </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo e(route('add-staff')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body">
                                    <h5 class="brand-red pb-2 pt-2 text-underline"><u>Enter person details</u></h5>
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
                                                   name="email" value="<?php echo e(old('email')); ?>" autocomplete="email"
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
                                               name="password" required autocomplete="new-password" required>
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
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-left flex-column users-list" role="tablist"
                    style="padding: 0!important;">
                    <div style="display: none;"><?php echo e($i=0); ?></div>

                    <?php $__currentLoopData = $usersOfOrg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($usr->id==$user->id): ?>

                            <?php continue; ?>
                        <?php endif; ?>
                        <div style="display: none;"><?php echo e($i++); ?></div>
                        <li class="nav-item  p-1">
                            <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> d-flex"
                               id="baseVerticalLeft-tab<?php echo e($i); ?>" data-toggle="tab"
                               aria-controls="tabVerticalLeft<?php echo e($i); ?>" href="#tabVerticalLeft<?php echo e($i); ?>"
                               role="tab"
                               aria-selected="<?php if($i==1): ?> true <?php else: ?> false <?php endif; ?>">
                                <img alt=""
                                     src="/storage/<?php echo e($usr->image??'user/profiles/user_default.svg'); ?>"
                                     style="border-radius: 50%;width: 36px;height: 36px">
                                <p class="pt-2 pl-2" style="color: #9f9f9f"><?php echo e($usr->name); ?></p>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </div>
            <div class="col-sm-9 card" style="border-radius: 0">
                <section id="nav-filled tab" class="tab-content">
                    <div style="display: none;"><?php echo e($i=0); ?></div>
                    <?php if($usersOfOrg->count()<=1): ?>

                        <div class="text-center pt-2" style="color: #4285f4;font-size: 32px">
                            You havent added any staffs yet
                        </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $usersOfOrg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($usr->id==$user->id): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <div style="display: none;"><?php echo e($i++); ?></div>
                        <div class="tab-pane <?php if($i==1): ?> active <?php endif; ?>" id="tabVerticalLeft<?php echo e($i); ?>"
                             role="tabpanel" aria-labelledby="baseVerticalLeft-tab<?php echo e($i); ?>">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified mb-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active pt-3 pb-3" id="home-tab-fill<?php echo e($i); ?>"
                                       data-toggle="tab"
                                       href="#home-fill<?php echo e($i); ?>" role="tab" aria-controls="home-fill<?php echo e($i); ?>"
                                       aria-selected="true">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pt-3 pb-3" id="profile-tab-fill<?php echo e($i); ?>"
                                       data-toggle="tab"
                                       href="#profile-fill<?php echo e($i); ?>"
                                       role="tab" aria-controls="profile-fill<?php echo e($i); ?>"
                                       aria-selected="false">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pt-3 pb-3" id="messages-tab-fill<?php echo e($i); ?>"
                                       data-toggle="tab"
                                       href="#messages-fill<?php echo e($i); ?>" role="tab"
                                       aria-controls="messages-fill<?php echo e($i); ?>"
                                       aria-selected="false">Working Hours</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pt-3 pb-3" id="settings-tab-fill<?php echo e($i); ?>"
                                       data-toggle="tab"
                                       href="#settings-fill<?php echo e($i); ?>" role="tab"
                                       aria-controls="settings-fill<?php echo e($i); ?>"
                                       aria-selected="false">Breaks</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content pt-1 ">
                                <div class="tab-pane active" id="home-fill<?php echo e($i); ?>" role="tabpanel"
                                     aria-labelledby="home-tab-fill<?php echo e($i); ?>">

                                    <form method="POST" action=""
                                          class="form-horizontal">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <img alt="Image placeholder"
                                                     src="<?php echo e(asset('img\home\user_default.svg')); ?>"
                                                     class="w-100"
                                                     style="border-radius: 50%;max-width: 150px">


                                            </div>
                                            <div class="col-sm-9 pt-1">
                                                <input type="name" class="form-control"
                                                       id="name"
                                                       placeholder="Fullname"
                                                       style="font-size: 28px;font-weight: 500;color: rgb(86,86,86);"
                                                       value="<?php echo e($usr->name); ?>">

                                                <textarea class="form-control mt-1"
                                                          id="basicTextarea" rows="3"
                                                          placeholder="Staff Description"></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row mb-2"
                                             style="margin-bottom: 0">
                                            <label class="control-label col-sm-3 text-right"
                                                   for="email">Mobile</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control"
                                                       id="email"
                                                       placeholder="Mobile" value="<?php echo e($user->phone); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-2"
                                             style="margin-bottom: 0">
                                            <label class="control-label col-sm-3 text-right"
                                                   for="email"
                                            >Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control"
                                                       id="email"
                                                       value="<?php echo e($usr->email); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label class="control-label col-sm-3 text-right"
                                                   for="email">CC Emails To</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control"
                                                       id="email"
                                                       placeholder="Enter email">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-3 text-right"
                                            >Staff Login Page</label>
                                            <div class="col-sm-9">
                                                <a href="#" class="text-blue">https://loremipsumidolorandomlinkcoverinhnowhererighnkw</a>
                                            </div>

                                        </div>
                                        <hr>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-3 text-right"
                                                   for="email">Staff Login</label>
                                            <div class="col-sm-9">
                                                <div class="row mb-2 ">
                                                    <div class="col-md-6">
                                                        <div class="d-flex">
                                                            <div class="">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox"
                                                                           class="custom-control-input"
                                                                           id="customSwitch9">
                                                                    <label class="custom-control-label"
                                                                           for="customSwitch9">
                                                                        <span class="switch-text-left">On</span>
                                                                        <span class="switch-text-right">Off</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class=" pl-4">
                                                                Requires email
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <select class="form-control"
                                                                id="basicSelect">
                                                            <option <?php if($usr->role_id==4): ?> selected <?php endif; ?>>
                                                                Security Access
                                                            </option>
                                                            <option <?php if($usr->role_id==2): ?> selected <?php endif; ?>>
                                                                Admin Access
                                                            </option>
                                                            <option <?php if($usr->role_id==3): ?> selected <?php endif; ?>>
                                                                Reception Access
                                                            </option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-6">

                                                        Access Controls

                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox"
                                                                           class="custom-control-input"
                                                                           id="customSwitch10">
                                                                    <label class="custom-control-label"
                                                                           for="customSwitch10">
                                                                        <span class="switch-text-left">On</span>
                                                                        <span class="switch-text-right">Off</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 pl-4">
                                                                Allow staff to update breaks
                                                                and hours
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </form>


                                </div>
                                <div class="tab-pane" id="profile-fill<?php echo e($i); ?>" role="tabpanel"
                                     aria-labelledby="profile-tab-fill<?php echo e($i); ?>">
                                    <p>
                                        <?php echo e($i*10000000000000); ?> Biscuit powder jelly beans. Lollipop candy
                                        canes croissant icing chocolate cake. Cake fruitcake powder
                                        pudding pastry.</p>
                                    <p>
                                        Tootsie roll oat cake I love bear claw I love caramels caramels
                                        halvah chocolate bar. Cotton candy
                                        gummi
                                        bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops
                                        danish dessert I love caramels
                                        powder.
                                    </p>

                                </div>
                                <div class="tab-pane" id="messages-fill<?php echo e($i); ?>" role="tabpanel"
                                     aria-labelledby="messages-tab-fill<?php echo e($i); ?>">
                                    <p>
                                        Biscuit powder jelly beans. Lollipop candy canes croissant icing
                                        chocolate cake. Cake fruitcake powder
                                        pudding pastry.
                                    </p>
                                </div>
                                <div class="tab-pane" id="settings-fill<?php echo e($i); ?>" role="tabpanel"
                                     aria-labelledby="settings-tab-fill<?php echo e($i); ?>">
                                    <p>
                                        Tootsie roll oat cake I love bear claw I love caramels caramels
                                        halvah chocolate bar. Cotton candy
                                        gummi
                                        bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops
                                        danish dessert I love caramels
                                        powder.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('js/argon-dashboard.min.js?v=1.1.1')); ?>"></script>
    <script src="<?php echo e(asset('at/js/scripts/modal/components-modal.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>

    <script src="<?php echo e(asset('at/js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>


































<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/orgStaffs.blade.php ENDPATH**/ ?>