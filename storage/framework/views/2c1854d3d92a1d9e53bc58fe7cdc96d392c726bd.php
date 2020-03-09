<?php $__env->startSection('title', 'Reports Management'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('at/css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <p>A log of all visitors who have ever visited the organization</p>
    </div>
  </div>


  <!-- Column selectors with Export Options and print table -->
  <section id="column-selectors">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Visitors for <?php echo e($organisation->name); ?></h3>
                       </div>
                  <div class="card-content">
                      <div class="card-body card-dashboard">
                          <div class="table-responsive">
                              <table class="table table-striped dataex-html5-selectors">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Department</th>
                                          <th>Phone</th>
                                          <th>ID Number</th>
                                          <th>Date</th>
                                          <th>Timetaken(Hrs)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td><?php echo e($visit->first_name." ".$visit->last_name); ?></td>
                                      <td><?php echo e($visit->email); ?></td>
                                      <td><?php echo e($visit->office); ?></td>
                                      <td><?php echo e($visit->phone); ?></td>
                                      <td><?php echo e($visit->national_id); ?></td>
                                      <td><?php echo e(explode(' ',trim($visit->created_at))[0]); ?></td>
                                      <td><?php echo e(array('<1hr','1 hr','2 hr','3 hr')[random_int(0,2)]); ?></td>
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
  <!-- Column selectors with Export Options and print table -->

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

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/visitorsReports.blade.php ENDPATH**/ ?>