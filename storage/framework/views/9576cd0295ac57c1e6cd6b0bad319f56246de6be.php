<?php $__env->startSection('title', 'List View'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/file-uploaders/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/file-uploaders/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="data-list-view" class="data-list-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light pr-3"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another Action</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                <tr>
                    <th class="text-uppercase">Disable/Enable</th>
                    <th>Organisation</th>
                    <th class="text-uppercase">Subscription</th>
                    <th class="text-uppercase">Date Subscribed</th>
                    <th class="text-uppercase">Subscription Period</th>
                    <th class="text-uppercase">Time Left</th>

                    <th class="text-uppercase">Status</th>
                </tr>
                </thead>
                <tbody>
                <div style="display: none"><?php echo e($count=1); ?>

                    <?php echo e($skipFirstColumn=true); ?>

                </div>

                <?php
                    $service=\App\Subscription::where('organisation_id', $organisation->id)->get()[0];
                ?>

                <?php $__currentLoopData = $organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ogt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($skipFirstColumn): ?>
                        <div style="display: none">
                            <?php echo e($skipFirstColumn=!$skipFirstColumn); ?>

                        </div>
                        <?php continue; ?>
                    <?php endif; ?>

                    <tr>
                        <td>
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <input type="checkbox" value="<?php echo e($ogt->id); ?>" class="custom-control-input orgManageCheck"
                                       id="customSwitch<?php echo e($count+15); ?>" <?php if($ogt->access_status>0): ?> checked <?php endif; ?>>
                                <label class="custom-control-label" for="customSwitch<?php echo e($count+15); ?>">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-x"></i></span>
                                </label>
                            </div>
                        </td>

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
                            <?php echo e($service->service->title); ?>


                        </td>
                        <td>
                            <?php echo e($service->subscribed_on); ?>

                        </td>
                        <td>
                            1 Month

                        </td>

                        <td>
                            <span style="font-size: 24px">

                                    <?php
                                        $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                        $datetime2 =new DateTime($service->subscribed_on);
                                        date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                        $interval = $datetime2->diff($datetime1);
                                        echo abs($interval->format('%R%a days'));
                                    ?>
                                </span> days
                        </td>

                        <td>
                            <?php if($ogt->access_status>0): ?>
                                <div class="chip chip-primary mr-1">
                                    <div class="chip-body">
                                        <span class="chip-text">In Operation</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="chip chip-danger mr-1">
                                    <div class="chip-body">

                                        <span class="chip-text">Disabled</span>

                                    </div>
                                </div>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <div class="cs-hidden"><?php echo e($count++); ?></div>
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
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/popover/popover.js')); ?>"></script>


    <script>

        $('.orgManageCheck').change(function () {
            $.get("organisations/manage-status" + "?status=" + this.checked + "&id=" + this.value, function (data, status) {
                if(data===1){
                    //success
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/billing-list.blade.php ENDPATH**/ ?>