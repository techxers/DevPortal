<?php $__env->startSection('title', 'Billing List'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link href="<?php echo e(asset('custom/argon/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/file-uploaders/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/file-uploaders/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="data-list-view" class="data-list-view-header">
        
        <div class="action-btns d-nonex">Enable or Disable Service</div>

        
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                <tr>
                    <th class="text-uppercase">Disable/Enable</th>
                    <th>Organisation</th>
                    <th class="text-uppercase">Subscription</th>
                    <th class="text-uppercase">Date Subscribed</th>
                    <th class="text-uppercase">Period</th>
                    <th class="text-uppercase">Amount Paid</th>
                    <th class="text-uppercase">Time Left</th>
                    <th class="text-uppercase">Status</th>
                </tr>
                </thead>
                <tbody>
                <div style="display: none"><?php echo e($count=1); ?>

                </div>


                <?php $__currentLoopData = \App\Subscription::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($subs->organisation->id==1): ?>
                        <?php continue; ?>
                    <?php endif; ?>

                    <tr>
                        <td>
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <input type="checkbox" value="<?php echo e($subs->organisation->id); ?>"
                                       class="custom-control-input orgManageCheck"
                                       id="customSwitch<?php echo e($count+15); ?>" name="<?php echo e($subs->organisation->name); ?>"
                                       <?php if($subs->organisation->access_status>0): ?> checked <?php endif; ?>>
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
                                         src="<?php echo e(asset(config('app.file_path').($subs->organisation->image??'organisation/logo/org_default.svg'))); ?>">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm"><?php echo e($subs->organisation->name); ?></span>
                                </div>
                            </div>
                        </th>
                        <td>
                            <?php $__currentLoopData = explode("%",trim($subs->plans)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_numeric($subs_title)): ?>
                                    <?php continue; ?>
                                <?php endif; ?>
                                <div class="cs-hidden">
                                    <?php echo e($plan=\App\Plan::find($subs_title)); ?>

                                </div>

                                <?php echo e($plan->product->title." (".($plan->title).")"); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </td>
                        <td>
                            <?php echo e(date_format(date_create($subs->subscribed_on), 'd/m/Y')." at ".date_format(date_create($subs->time_in), 'g:i A')); ?>

                        </td>
                        <td>
                            <?php $__currentLoopData = explode("%",trim($subs->plans)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subs_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_numeric($subs_title)): ?>
                                    <?php continue; ?>
                                <?php endif; ?>

                                <?php echo e($plan=\App\Plan::find($subs_title)->period); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <?php echo e($subs->amount_paid); ?>


                        </td>

                        <td>
                            <span style="font-size: 24px">

                                    <?php

                                        $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                        $datetime2 =new DateTime($subs->subscribed_on);
                                        date_add($datetime2, date_interval_create_from_date_string('30 days'));

                                        $interval = $datetime2->diff($datetime1);
                                        echo abs($interval->format('%R%a days'));

                                    ?>
                                </span> days
                        </td>

                        <td>
                            <?php if($subs->organisation->access_status>0): ?>
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
        
    </section>
    
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


    <script>


        $('.orgManageCheck').change(function () {
            var switchState = this;
            var org = this.name;
            var reason="";
            var id=this.value;

            if (switchState.checked) {
                $.get("organisations/manage-status" + "?status=" + switchState.checked+ "&id=" + id, function (data, status) {

                    if (data) {
                        Swal.fire({
                            title: "Running",
                            text: "VSM for " + org + " is running",
                            type: "info",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'Reason for shutdown',
                    input: "textarea",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonClass: "btn btn-danger ml-1",
                }).then(function (result) {
                    if (result.value) {
                        $.get("organisations/manage-status" + "?status=" + switchState.checked + "&reason=" + result.value + "&id=" + id, function (data, status) {
                            if (data) {
                                 Swal.fire({
                                  title: "Shutdown",
                                  text: " VSM for " + org + " has been shutdown",
                                  type: "error",
                                  confirmButtonClass: 'btn btn-danger',
                                  buttonsStyling: false,
                              });

                            }

                        })
                    }
                    else {
                        switchState.checked=true;
                    }

                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/billing-list.blade.php ENDPATH**/ ?>