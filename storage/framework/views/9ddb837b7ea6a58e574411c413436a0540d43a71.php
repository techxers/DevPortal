<?php $__env->startSection('title', 'Visitor Logs'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <p>Visitors list display</p>
        </div>
    </div>
<div style="display:none"><?php echo e($orgt=$organisation->name); ?></div>
    <!-- Complex headers table -->
    <section id="headers">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e($orgt); ?></h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Table list of the particular visitors who visited <?php echo e($orgt); ?>

                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered complex-headers">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">Person Name</th>
                                        <th colspan="2">Person Visited</th>
                                        <th colspan="3">Contact</th>
                                    </tr>
                                    <tr>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>National ID</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($visit->first_name." ".$visit->last_name); ?></td>
                                            <td><?php echo e($visit->host); ?></td>
                                            <td><?php echo e($visit->office); ?></td>
                                            <td><?php echo e($visit->phone); ?></td>
                                            <td><?php echo e($visit->email); ?></td>
                                            <td><?php echo e($visit->national_id); ?></td>
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

    <!--/ Complex headers table -->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('at/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('at/js/scripts/datatables/datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('at/js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/orgVisitors.blade.php ENDPATH**/ ?>