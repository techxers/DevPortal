<?php $__env->startSection('title', 'Visitor Logs'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <p>Click 'view more' to view more additional information
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Organisations & Visitors</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors connected to a particular organisation
                            </p>
                            <div class="table-responsive">
                                <table class="table nowrap scroll-horizontal-vertical" style="width: 100%!important;">
                                    <thead>
                                    <tr>
                                        <th>Organisation Name</th>
                                        <th>Total Visitors</th>
                                        <th>View More</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = \App\Organisation::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="display: none"><?php echo e($visCount=\App\Visitor::where('organisation_id',$org->id)->count()); ?></div>
                                        <tr>
                                            <td><?php echo e($org->name); ?></td>
                                            <td><?php echo e($visCount); ?></td>
                                            <td>
                                                <a class="chip <?php if($visCount>0): ?> chip-primary <?php else: ?> chip-secondary <?php endif; ?> mr-1"
                                                   href="<?php if($visCount>0): ?> <?php echo e(route('visitors-org',['organisation_id' => \Illuminate\Support\Facades\Crypt::encrypt($org->id) ])); ?> <?php else: ?> javascript:void(0) <?php endif; ?>">
                                                    <div class="chip-body">

                                                        <span class="chip-text">View More</span>

                                                    </div>
                                                </a>
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

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/allVisitors.blade.php ENDPATH**/ ?>