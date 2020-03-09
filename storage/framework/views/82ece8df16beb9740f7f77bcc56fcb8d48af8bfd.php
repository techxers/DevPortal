<?php $__env->startSection('title', 'Reports Management'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="accordion" id="accordionExample">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-superAdmin',$user)): ?>
            <div class="collapse-margin">
                <div class="card-header " id="headingOne" data-toggle="collapse" role="button"
                     data-target="#collapseOne"
                     aria-expanded="false" aria-controls="collapseOne">
                  <span class="lead collapse-title">
                   Billing reports
                  </span>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Billing reports for <?php echo e(\App\Organisation::all()->count()); ?>

                                    organisations</h3>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                            <tr>
                                                <th>Organisation</th>
                                                <th>Email</th>
                                                <th class="text-uppercase">Subscription</th>
                                                <th class="text-uppercase">Date Subscribed</th>
                                                <th class="text-uppercase">Subscription Period</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                $service=\App\Subscription::where('organisation_id', $organisation->id)->get()[0];
                                            ?>

                                            <?php $__currentLoopData = \App\Organisation::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ogt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($ogt->name); ?></td>
                                                    <td><?php echo e($ogt->email); ?></td>
                                                    <td><?php echo e($service->service->title); ?></td>
                                                    <td><?php echo e($service->subscribed_on); ?></td>
                                                    <td>Monthly</td>
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
            </div>
        <?php endif; ?>
        <div class="collapse-margin">
            <div class="card-header" id="headingTwo" data-toggle="collapse" role="button" data-target="#collapseTwo"
                 aria-expanded="false" aria-controls="collapseTwo">
                  <span class="lead collapse-title">
                    All walking ins
                  </span>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All visitor walk ins for <?php echo e($organisation->name); ?></h3>
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
                                                <?php if($visit->visitor_state!=2): ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>
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
        </div>
        <div class="collapse-margin">
            <div class="card-header" id="headingThree" data-toggle="collapse" role="button" data-target="#collapseThree"
                 aria-expanded="false" aria-controls="collapseThree">
                  <span class="lead collapse-title">
                    All appointments
                  </span>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All appointments for <?php echo e($organisation->name); ?></h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>ID Number</th>
                                            <th>Date</th>
                                            <th>Office</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = \App\Appointment::where('organisation_id', $organisation->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(\App\Visitor::find($appoint->visitor_id)->first_name); ?></td>
                                                <td><?php echo e(\App\Visitor::find($appoint->visitor_id)->last_name); ?></td>
                                                <td><?php echo e(\App\Visitor::find($appoint->visitor_id)->phone); ?></td>
                                                <td><?php echo e(\App\Visitor::find($appoint->visitor_id)->email); ?></td>
                                                <td><?php echo e(\App\Visitor::find($appoint->visitor_id)->national_id); ?></td>
                                                <td><?php echo e($appoint->appoint_date); ?></td>
                                                <td><?php echo e(\App\Visitor::find($appoint->visitor_id)->office); ?></td>

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
        </div>
        <div class="collapse-margin">
            <div class="card-header" id="headingFour" data-toggle="collapse" role="button" data-target="#collapseFour"
                 aria-expanded="false" aria-controls="collapseFour">
                  <span class="lead collapse-title">
                   All checked out
                  </span>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Visitors who checked out of <?php echo e($organisation->name); ?></h3>
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
                                            <?php if($visit->visit_state!=3): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                            <tr>
                                                <?php if($visit->visitor_state!=3): ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>
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
        </div>
    </div>

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

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/reports.blade.php ENDPATH**/ ?>