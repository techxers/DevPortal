<?php $__env->startSection('title', 'Appointments'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <p>System will send  an email and sms for in one day before to notify users of his appointment
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Appointments table</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors appointments of this organisation
                            </p>
                            <div class="table-responsive">
                                <table class="table zero-configuration"
                                >
                                    <thead>
                                    <tr>
                                        <th scope="col">Count</th>
                                        <th scope="col">ID Number</th>
                                        <th scope="col">Host</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Appointment</th>
                                        <th scope="col">Days Remaining</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Notification</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $i=0;
                                    ?>
                                    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i+=1); ?></td>
                                            <td><?php echo e($appoint->national_id); ?></td>
                                            <td><?php echo e($appoint->visitor->host); ?></td>
                                            <td><?php echo e($appoint->visitor->office); ?></td>
                                            <td><?php echo e($appoint->appointment_dateTime); ?></td>
                                            <td>
                                                <?php
                                                    $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                                    $datetime2 =new DateTime($appoint->appointment_dateTime);

                                                    $interval = $datetime2->diff($datetime1);
                                                    echo abs($interval->format('%R%a days'));
                                                ?>
                                                 days
                                            </td>
                                            <td><?php echo e($appoint->status); ?></td>
                                            <td>
                                                <?php if($appoint->notified<1): ?>
                                                    <span class="text-primary"><?php echo e('Not Notified'); ?></span>
                                                <?php else: ?>
                                                    <span class="text-success"><?php echo e('Sent'); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Scroll - horizontal and vertical table -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/datatables/datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/appointments.blade.php ENDPATH**/ ?>