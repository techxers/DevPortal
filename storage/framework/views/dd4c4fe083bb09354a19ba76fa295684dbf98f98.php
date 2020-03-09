<?php $__env->startSection('title', 'Edit Staff'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/forms/select/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/pickers/pickadate/pickadate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/forms/validation/form-validation.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/app-user.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- users edit start -->
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                               href="#account"
                               aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <!-- users edit media object start -->
                            <div class="media mb-2">
                                <a class="mr-2 my-25" href="#">
                                    <img src="<?php echo e(asset(config('app.file_path').($staffEdit->image??'user/profiles/user_default.svg'))); ?>"
                                         alt="users avatar"
                                         class="users-avatar-shadow rounded" height="64" width="64">
                                </a>
                                <div class="media-body mt-50">
                                    <h4 class="media-heading"><?php echo e($staffEdit->name); ?></h4>
                                    <div class="col-12 d-flex mt-1 px-0">
                                        <p>Active</p>
                                    </div>
                                </div>
                            </div>
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <form method="post" action="<?php echo e(route('user-profile-update')); ?>"
                                  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                                <!-- *********************************** -->
                                <div class="cs-hidden">
                                    <input type="number" name="id" value="<?php echo e($staffEdit->id); ?>">
                                </div>
                                <!-- *********************************** -->

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control text-lowercase"
                                                       placeholder="Phone number" value="<?php echo e($staffEdit->phone); ?>"
                                                       name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Name</label>
                                                <input type="text" class="form-control"
                                                       value="<?php echo e($staffEdit->name); ?>" required
                                                       name="name"
                                                       data-validation-required-message="This name field is required"
                                                       placeholder="First & Second Name" max="30"
                                                       pattern="[A-Z][A-Za-z+0-9+']*[ ][A-Z][A-Za-z+0-9+']*"
                                                       title="Two names start with capital letter">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" placeholder="Email"
                                                       value="<?php echo e($staffEdit->email); ?>"
                                                       required
                                                       data-validation-required-message="This email field is required"
                                                       name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" required name="status">
                                                <option value="1" <?php if($staffEdit): ?> selected <?php endif; ?>>Active</option>
                                                <option value="0" <?php if(!($staffEdit->status)): ?> selected <?php endif; ?>>Blocked
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" required name="role_id">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-superAdmin', $user)): ?>
                                                    <option <?php if($staffEdit->role_id==1): ?> selected <?php endif; ?> value="1">
                                                        SuperAdmin Access
                                                    </option>
                                                <?php endif; ?>
                                                <option <?php if($staffEdit->role_id==2): ?> selected <?php endif; ?> value="2">Admin
                                                </option>
                                                <option <?php if($staffEdit->role_id==3): ?> selected <?php endif; ?> value="3">
                                                    Reception
                                                </option>
                                                <option <?php if($staffEdit->role_id==4): ?> selected <?php endif; ?> value="4">Security
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input type="text" class="form-control" value="<?php echo e($organisation->name); ?>"
                                                   placeholder="Company name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive border rounded px-1 ">
                                            <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i
                                                        class="feather icon-lock mr-50 "></i>Permission</h6>
                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th>Module</th>
                                                    <th>Read</th>
                                                    <th>Write</th>
                                                    <th>Create</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Users</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox1"
                                                                    class="custom-control-input" checked>
                                                            <label class="custom-control-label"
                                                                   for="users-checkbox1"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox2"
                                                                    class="custom-control-input"><label
                                                                    class="custom-control-label"
                                                                    for="users-checkbox2"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox3"
                                                                    class="custom-control-input"><label
                                                                    class="custom-control-label"
                                                                    for="users-checkbox3"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox4"
                                                                    class="custom-control-input" checked>
                                                            <label class="custom-control-label"
                                                                   for="users-checkbox4"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Articles</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox5"
                                                                    class="custom-control-input"><label
                                                                    class="custom-control-label"
                                                                    for="users-checkbox5"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox6"
                                                                    class="custom-control-input" checked>
                                                            <label class="custom-control-label"
                                                                   for="users-checkbox6"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox7"
                                                                    class="custom-control-input"><label
                                                                    class="custom-control-label"
                                                                    for="users-checkbox7"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox8"
                                                                    class="custom-control-input" checked>
                                                            <label class="custom-control-label"
                                                                   for="users-checkbox8"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Staff</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox9"
                                                                    class="custom-control-input" checked>
                                                            <label class="custom-control-label"
                                                                   for="users-checkbox9"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox10"
                                                                    class="custom-control-input" checked>
                                                            <label class="custom-control-label"
                                                                   for="users-checkbox10"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox11"
                                                                    class="custom-control-input"><label
                                                                    class="custom-control-label"
                                                                    for="users-checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox"><input
                                                                    type="checkbox" id="users-checkbox12"
                                                                    class="custom-control-input"><label
                                                                    class="custom-control-label"
                                                                    for="users-checkbox12"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                            Save
                                            Changes
                                        </button>
                                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- users edit ends -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('vendors/js/forms/select/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/forms/validation/jqBootstrapValidation.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.date.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    
    <script src="<?php echo e(asset('js/scripts/pages/app-user.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/navs/navs.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/edit-staffs.blade.php ENDPATH**/ ?>