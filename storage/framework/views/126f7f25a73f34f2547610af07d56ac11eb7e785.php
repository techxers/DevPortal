<?php $__env->startSection('title', 'User Profile'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt-2 mb-5">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-6 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center pr-2">
                        <div class="col-lg-4 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="<?php echo e(asset(config('app.file_path').($user->image??'user/profiles/user_default.svg'))); ?>"
                                         class="rounded-circle "
                                         style="width:400px;height:auto;max-width: 128px">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between" style="width: 100%">
                            <a href="#" class="btn btn-sm btn-info mr-4">
                                <?php echo e($role->name); ?>

                            </a>
                            <a href="<?php echo e(route('settings')); ?>" class="btn btn-sm btn-secondary float-right">Settings</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">

                        <div class="text-center">
                            <h3 class="text-capitalize">
                                <?php echo e($user->name); ?>

                            </h3>
                            <div class="h5 font-weight-300 text-capitalize">
                                <i class="ni location_pin mr-2"></i><?php echo e($organisation->city.", ".$organisation->country); ?>

                            </div>
                            <div class="h5 mt-4">
                                <?php if($role->id<3): ?>
                                    System admin, responsible for controlling the VMS for the company:
                                <?php else: ?>
                                    This is the system client, third party user, can only manage the visitors for:
                                <?php endif; ?>
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i><?php echo e($organisation->name); ?>

                            </div>
                            <hr class="my-4"/>
                            <p>
                                Your profile can only be viewed with the system admins, its important
                            to update your profile for easier communication between the system  users.
                            </p>

                            <div class="container-fluid pt-3 collapse" id="editInfo">
                                <form action="javascript:void(0)">
                                    <div class="row" id="form2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="name"
                                                       class="form-control form-control-alternative"
                                                       placeholder="Fullnames"
                                                       value="<?php echo e($user->name); ?>" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="email"
                                                       class="form-control form-control-alternative"
                                                       placeholder="Email address"
                                                       value="<?php echo e($user->email); ?>" type="email" disabled
                                                       style="background-color: lightgrey!important;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="phone" name="phone"
                                                       class="form-control form-control-alternative"
                                                       placeholder="Phone"
                                                       value="<?php echo e($user->phone); ?>" type="tel">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                       for="password">Password</label>
                                                <input id="password" name="password"
                                                       class="form-control form-control-alternative"
                                                       placeholder="new password"
                                                       type="password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input name="image"
                                                       class="form-control form-control-alternative"
                                                       value="<?php echo e($user->image); ?>" type="file">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group pt-3">

                                        <button type="submit" class="text-uppercase btn btn-primary btn-block"
                                                id="regBtn"> Save profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1" id="edit-profile">
                <div class="card shadow">
                    <div class="card-header border-0 pb-2">
                        <div class="row align-items-center" style="width: 100%">
                            <div class="col-8">
                                <h3 class="mb-0 text-capitalize cs-heading">My profile</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('organisation-profile')); ?>"
                                   class="btn btn-sm bg-brand-blue text-white">Organisation</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"
                         >

                        <form id="form2" method="post" action="<?php echo e(route('user-profile-update')); ?>"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <h6 class="heading-small text-muted mb-4 cs-text-shadow-white">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-black"
                                                   for="input-first-name">Role</label>
                                            <input type="text" id="role_id"
                                                   class="form-control form-control-alternative" style="color: #4285f4"
                                                   placeholder="Role" value="<?php echo e($user->role->name); ?> Access" readonly>


                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-black" for="input-email">Email
                                                address</label>
                                            <input type="email" id="input-email"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Email" value="<?php echo e($user->email); ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-black" for="fname">First
                                                name</label>
                                            <input type="text" id="fname" name="fname"
                                                   class="form-control form-control-alternative" placeholder="name"
                                                   value="<?php echo e(explode(' ',trim($user->name))[0]); ?>" required  readonly>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-black" for="lname">Last
                                                name</label>
                                            <input type="text" id="lname" name="lname"
                                                   class="form-control form-control-alternative" placeholder="Last name"
                                                   value="<?php if(count(explode(' ',trim($user->name)))>1): ?> <?php echo e(explode(' ',trim($user->name))[1]); ?> <?php endif; ?>" required  readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2"/>
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4 cs-text-shadow-white">Additional Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label cs-text-shadow-white text-black" for="phone">Phone</label>
                                            <input type="text" id="phone" name="phone"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Phone number"
                                                   value="<?php echo e($user->phone); ?>" >
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label cs-text-shadow-white text-black" for="input-country">Image</label>
                                            <input type="file" id="image" name="image"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Profile Image"
                                            >
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label text-black" for="input-country">Date
                                                Registered</label>
                                            <input type="datetime-local" id="date" name="date"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Your registered" value="<?php echo e(date_format(date_create($user->created_at), 'l jS F Y')); ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label text-black" for="password">Password</label>
                                            <input id="password" class="form-control form-control-alternative"
                                                   placeholder="Enter new password"
                                                   value="" type="password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label text-black" for="password">Confirm
                                                Password</label>
                                            <input id="password" class="form-control form-control-alternative"
                                                   placeholder="Confirm password"
                                                   value="" type="password">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="pl-lg-4 mt-2">
                                <button type="submit"
                                        class="text-uppercase btn btn-block text-capitalize bg-brand-blue text-white"
                                        id="regBtn"> Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <!-- vednor files -->
    <script src="<?php echo e(asset('vendors/js/extensions/jquery.steps.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>

    <script src="<?php echo e(asset('custom/argon/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->

    <script src="<?php echo e(asset('custom/argon/js/argon-dashboard.js?v=1.1.1')); ?>"></script>

    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    <!-- Page js files -->
    <script src="<?php echo e(asset('js/scripts/forms/wizard-steps.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>
























<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/profile-user.blade.php ENDPATH**/ ?>