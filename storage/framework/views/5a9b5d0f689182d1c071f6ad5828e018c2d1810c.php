<?php $__env->startSection('title', 'List View'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/file-uploaders/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/file-uploaders/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="data-list-view" class="data-list-view-header">
        <?php if(session('registered')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('registered')); ?>

            </div>
            <script>
                Swal.fire({
                    title: "Organisation Registered!",
                    text: "<?php echo e(session('registered')); ?>",
                    type: "success",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            </script>
        <?php endif; ?>
        <div class="action-btns d-nonex">Shows all the organisations registered</div>
        

        
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                <tr>
                    <th>Logo/Organisation</th>
                    <th class="text-uppercase">Status</th>
                    <th class="text-uppercase">Contact</th>

                    <th class="text-uppercase">Users</th>

                    <th class="text-uppercase">Industry/Type</th>
                    <th class="text-uppercase">Address</th>
                    <th class="text-uppercase">Activity</th>
                    <th class="text-uppercase"></th>
                </tr>
                </thead>
                <tbody>
                <div style="display: none"><?php echo e($count=1); ?>

                </div>

                <?php $__currentLoopData = $organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ogt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($ogt->id==1): ?>
                        <?php continue; ?>
                    <?php endif; ?>

                    <tr>

                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                    <img alt="Image placeholder"
                                         src="<?php echo e(asset(config('app.file_path').($ogt->image??'organisation/logo/org_default.svg'))); ?>">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm"><?php echo e($ogt->name); ?></span>
                                </div>
                            </div>
                        </th>

                        <td>
                            <div style="display: none"><?php echo e($count++); ?></div>
                            <?php if($ogt->subscript_status>1): ?>
                                <div class="chip chip-success mr-1">
                                    <div class="chip-body">
                                        <span class="chip-text">Settled</span>
                                    </div>
                                </div>
                            <?php elseif($ogt->subscript_status==1): ?>
                                <div class="chip chip-warning mr-1">
                                    <div class="chip-body">
                                        <span class="chip-text">Almost</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="chip chip-danger mr-1">
                                    <div class="chip-body">

                                        <span class="chip-text">Expired</span>

                                    </div>
                                </div>

                            <?php endif; ?>


                        </td>
                        <td>

                            <div class="dropdown">
                                <a class="btn-sm btn-icon-only text-light" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-address-book fa-2x text-info"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="p-2">
                                        <li class="dropdown-item"> Phone : <a
                                                    href="tel:<?php echo e($ogt->phone); ?>"><?php echo e($ogt->phone); ?></a></li>
                                        <li class="dropdown-item"> Email : <a
                                                    href="mailto: <?php echo e($ogt->email); ?>"> <?php echo e($ogt->email); ?></a></li>
                                        <li class="dropdown-item"> Postal Address : <?php echo e($ogt->postcode); ?></li>
                                        <li class="dropdown-item"> Website : <a href="<?php echo e(substr($ogt->website,0,10)); ?>">Open
                                                Website</a></li>
                                    </ul>
                                </div>

                            </div>


                        </td>

                        <td>
                            <div class="avatar-group">
                                <?php
                                    $c=0;
                                ?>

                                <?php $__currentLoopData = $ogt->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $c++
                                    ?>

                                    <?php if($c>5): ?>
                                        <?php break; ?>;
                                    <?php endif; ?>
                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                       data-original-title="<?php echo e($orgUser->name); ?>">
                                        <img src="<?php echo e(asset(config('app.file_path').($orgUser->image??'user/profiles/user_default.svg'))); ?>"
                                             class="rounded-circle" alt=""
                                             <?php if($orgUser->role_id<3): ?> style="width: 36px;height: 36px" <?php endif; ?>>
                                    </a>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>


                        <td>
                            <div class="small">
                                <?php echo e($ogt->industry); ?>

                            </div>
                            <span class="small"><?php echo e($ogt->type); ?></span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn-sm btn-icon-only text-light" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-map-pin fa-2x text-info"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="p-2">
                                        <li class="dropdown-item"> Based
                                            in <?php echo e($ogt->city.', '.$ogt->country); ?></li>
                                        <li class="dropdown-item">Postal Address : <?php echo e($ogt->postcode); ?></li>
                                    </ul>
                                </div>

                            </div>
                        </td>

                        <td>
                            <div style="display: none;">
                                <?php echo e($randomAct=random_int(10,100)); ?>

                            </div>
                            <div class="d-flex align-items-center">
                                <span class="mr-2"><?php echo e($randomAct); ?>%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar
                                                                <?php if($randomAct>=80): ?>
                                                bg-success
<?php elseif($randomAct>=60): ?>
                                                bg-info
<?php elseif($randomAct>=40): ?>
                                                bg-warning
<?php else: ?>
                                                bg-danger
<?php endif; ?>
                                                " role="progressbar"
                                             aria-valuenow="<?php echo e($randomAct); ?>" aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: <?php echo e($randomAct); ?>%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">

                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="javascript:void(0)"
                                       onclick="document.getElementById('showModal').style.display='block';pasteFormData('<?php echo e($ogt->id); ?>', '<?php echo e($ogt->name); ?>', '<?php echo e($ogt->email); ?>', '<?php echo e($ogt->phone); ?>', '<?php echo e($ogt->website); ?>', '<?php echo e($ogt->postcode); ?>', '<?php echo e($ogt->city); ?>','<?php echo e($ogt->country); ?>', '<?php echo e($ogt->industry); ?>')">Edit
                                        Data</a>
                                    <a class="dropdown-item" href="#">Send Notification</a>
                                    <a class="dropdown-item" href="#">Terminate</a>
                                </div>

                            </div>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        


        <script>
            function pasteFormData(uuid, name, email, phone, website, postcode, city, country, industry) {
                const fm = document.forms["editForm"];
                fm['name'].value = name;
                fm['email'].value = email;
                fm['phone'].value = phone;
                fm['idContainer'].value = uuid;
                fm['website'].value = website;
                fm['postcode'].value = postcode;
                fm['city'].value = city;
                fm['country'].value = country;
                fm['industry'].value = industry;

                //  fm.action = 'organisations/update/' + uuid;
            }
        </script>

    </section>
    <div class="showModal" id="showModal">
        <div style="position: absolute;left: 0;right: 0;top: 0;bottom: 0;"
             onclick="document.getElementById('showModal').style.display='none'"></div>
        <div class="card rounded" style="margin-top:72px; overflow-y: scroll">
            <div class="card-header p-2">
                <h3 class="text-white cs-text-shadow">Edit Data for the organisation</h3>
                <button type="button" class="close cs-text-shadow pr-3 pt-2"
                        onclick="document.getElementById('showModal').style.display='none'">
                                                <span style="font-size: 64px"
                                                      class="text-white cs-text-shadow">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('update-organisations')); ?>" enctype="multipart/form-data"
                      method="post" name="editForm">
                    <?php echo csrf_field(); ?>
                    <h6 class="heading-small text-muted">organisations Basic</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div style="display: none">
                                <input type="text" id="idContainer" name="idContainer"
                                       value="">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="name">Name</label>
                                    <input type="text" id="name" name="name"
                                           class="form-control form-control-alternative"
                                           placeholder="Name of the Organiz..."
                                           value="->name}}"
                                           required>
                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email-address</label>
                                    <input type="email" id="email" name="email"
                                           class="form-control form-control-alternative"
                                           placeholder="company@example.com"
                                           value="->email}}">
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone"
                                           class="form-control form-control-alternative"
                                           placeholder="Phone number"
                                           value="->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="website">Website</label>
                                    <input type="text" id="website" name="website"
                                           class="form-control form-control-alternative"
                                           placeholder="Website" value="->website}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Address -->
                    <h6 class="heading-small text-muted">Contact information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="postcode">Postal
                                        Address</label>
                                    <input id="postcode" name="postcode"
                                           class="form-control form-control-alternative"
                                           placeholder="Postal address"
                                           value="->postcode}}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="city">City</label>
                                    <input type="text" id="city" name="city"
                                           class="form-control form-control-alternative"
                                           placeholder="City" value="->city}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="country">Country</label>
                                    <input type="text" id="country" name="country"
                                           class="form-control form-control-alternative"
                                           placeholder="Country" value="->country}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="industry">Industry</label>
                                    <input type="text" id="industry" name="industry"
                                           class="form-control form-control-alternative"
                                           placeholder="Industry dealings"
                                           value="->city}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-lg-4">
                        <div class="form-group pt-2">

                            <button type="submit"
                                    class="text-uppercase btn btn-primary btn-block"
                                    id="regBtn"> Save Edits
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('vendors/js/extensions/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/popover/popover.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/extensions/sweet-alerts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/organisations.blade.php ENDPATH**/ ?>