<?php $__env->startSection('title', 'View Reports'); ?>
<?php $__env->startSection('vendor-style'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-superAdmin',$user)): ?>
        
        <section id="accordion-with-margin">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card collapse-icon accordion-icon-rotate">
                        <div class="card-header">
                            <h4 class="card-title">System Users Reports</h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i
                                                    class="feather icon-chevron-down"></i></a></li>
                                    <li><a data-action="expand"><i
                                                    class="feather icon-maximize"></i></a></li>
                                    <li><a data-action="reload"><i
                                                    class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                You as the SuperAdmin can view, filter, search and sort through all the reports for the
                                organisations using the system,
                            </p>
                            <div class="accordion" id="accordionExample">
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingOne" data-toggle="collapse" role="button"
                                         data-target="#collapseOne"
                                         aria-expanded="false" aria-controls="collapseOne">
                  <span class="lead collapse-title">
                    Billing Reports
                  </span>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">

                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-muted">Summary</h5>
                                            </div>
                                            <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1001) ])); ?>">
                                                <div class="row small">
                                                    <div class="col-4">
                                                        <div class="pt-1">
                                                            Active <?php echo e(\App\Subscription::where("is_active",true)->count()); ?>

                                                        </div>
                                                        <div class="pt-1">
                                                            Not
                                                            Active <?php echo e(\App\Subscription::where("is_active",false)->count()); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-4" style="font-size: 20px;color: black">
                                                        Most Popular product <br>
                                                        <span style="font-size: 15px;color: grey">
                                                        <?php
                                                            $subs = array();
                                                        ?>
                                                            <?php $__currentLoopData = \App\Subscription::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = explode("%",trim($subscription->products)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(!is_numeric($subscription_id)): ?>
                                                                        <?php continue; ?>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                        array_push($subs,$subscription_id)
                                                                    ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php


                                                                $values = array_count_values($subs);
                                                                arsort($values);
                                                                $popular = array_slice(array_keys($values), 0, 5, true);

                                                            if(count($popular)>0){
                                                            echo  \App\Product::find($popular[0])->title;
                                                            }
                                                            ?>

                                                    </span>
                                                    </div>
                                                    <div class="col-4" style="font-size: 20px;color: black">
                                                        Most Popular plan
                                                        <br>
                                                        <span style="font-size: 15px;color: grey">
                                                        <?php
                                                            $subs = array();
                                                        ?>
                                                            <?php $__currentLoopData = \App\Subscription::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $__currentLoopData = explode("%",trim($subscription->plans)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(!is_numeric($subscription_id)): ?>
                                                                        <?php continue; ?>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                        array_push($subs,$subscription_id)
                                                                    ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php


                                                                $values = array_count_values($subs);
                                                                arsort($values);
                                                                $popular = array_slice(array_keys($values), 0, 5, true);

                                                              if(count($popular)>0){
                                                            echo \App\Plan::find($popular[0])->title;
                                                            }
                                                            ?>

                                                    </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingTwo" data-toggle="collapse" role="button"
                                         data-target="#collapseTwo"
                                         aria-expanded="false" aria-controls="collapseTwo">
                  <span class="lead collapse-title">
                    Users Reports
                  </span>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-muted">Summary</h5>
                                            </div>
                                            <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1002) ])); ?>">
                                                <div class="row small">
                                                    <div class="col-4">
                                                        <div class="pt-1">
                                                            Verified <?php echo e(\App\User::where("email_verified_at","!=",null)->count()); ?>

                                                        </div>
                                                        <div class="pt-1">
                                                            Not
                                                            Verified <?php echo e(\App\User::where("email_verified_at",null)->count()); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-4" style="font-size: 20px;color: black">
                                                        Total Users
                                                        <br>
                                                        <span style="font-size: 15px;color: grey">
                                                       <?php echo e(\App\User::all()->count()); ?>

                                                    </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingThree" data-toggle="collapse" role="button"
                                         data-target="#collapseThree"
                                         aria-expanded="false" aria-controls="collapseThree">
                  <span class="lead collapse-title">
                    Visitors Reports
                  </span>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-muted">Summary</h5>
                                            </div>
                                            <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1003) ])); ?>">
                                                <div class="row small">
                                                    <div class="col-4">
                                                        <div class="pt-1">
                                                            Total <?php echo e(\App\Visitor::all()->count()); ?>

                                                        </div>

                                                    </div>
                                                    <div class="col-4" style="font-size: 20px;color: black">
                                                        Most Visited: <br>
                                                        <span style="font-size: 15px;color: grey">
                                                        <?php
                                                            $vis = array();
                                                        ?>
                                                            <?php $__currentLoopData = \App\Visitor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($visitor->organisation_id==1): ?>
                                                                    <?php continue; ?>;
                                                                <?php endif; ?>
                                                                <?php
                                                                    array_push($vis,$visitor->organisation_id)
                                                                ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php

                                                                $values = array_count_values($vis);
                                                                arsort($values);
                                                                $popular = array_slice(array_keys($values), 0, 5, true);

                                                             if(count($popular)>0){
                                                            echo \App\Organisation::find($popular[0])->name;
                                                            }
                                                            ?>

                                                    </span>
                                                    </div>
                                                    <div class="col-4" style="font-size: 20px;color: black">
                                                        Less Visited
                                                        <br>
                                                        <span style="font-size: 15px;color: grey">
                                                        <?php
                                                            $vis = array();
                                                        ?>
                                                        <?php $__currentLoopData = \App\Visitor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                array_push($vis,$visitor->organisation_id)
                                                            ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php

                                                            $values = array_count_values($vis);
                                                            arsort($values);
                                                            $popular = array_slice(array_keys($values), 0, 5, true);

                                                          if(count($popular)>0){
                                                        echo \App\Organisation::find(end($popular))->name;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-admin',$user)): ?>
        
        <section id="accordion-with-margin">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card collapse-icon accordion-icon-rotate">
                        <div class="card-header">
                            <h4 class="card-title">Organisation Reports</h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i
                                                    class="feather icon-chevron-down"></i></a></li>
                                    <li><a data-action="expand"><i
                                                    class="feather icon-maximize"></i></a></li>
                                    <li><a data-action="reload"><i
                                                    class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                You as the Admin can view, filter, search and sort through all the reports for your
                                organisations,
                            </p>
                            <div class="accordion" id="accordionExample">
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingOne" data-toggle="collapse" role="button"
                                         data-target="#collapseOne"
                                         aria-expanded="false" aria-controls="collapseOne">
                  <span class="lead collapse-title">
                    Visitor Check ins
                  </span>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">

                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-muted">Summary</h5>
                                            </div>
                                            <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1004) ])); ?>">
                                                <div class="p-2 text-center">
                                                    View More
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingTwo" data-toggle="collapse" role="button"
                                         data-target="#collapseTwo"
                                         aria-expanded="false" aria-controls="collapseTwo">
                  <span class="lead collapse-title">
                    Visitor Check outs
                  </span>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-muted">Summary</h5>
                                            </div>
                                            <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1005) ])); ?>">
                                                <div class="p-2 text-center">
                                                    View More
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-margin">
                                    <div class="card-header" id="headingThree" data-toggle="collapse" role="button"
                                         data-target="#collapseThree"
                                         aria-expanded="false" aria-controls="collapseThree">
                  <span class="lead collapse-title">
                    Appointments
                  </span>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-muted">Summary</h5>
                                            </div>
                                            <a href="<?php echo e(route('load-reports',['report_id' => \Illuminate\Support\Facades\Crypt::encrypt(1006) ])); ?>">
                                                <div>
                                                    <div class="p-2 text-center">
                                                        View More
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    


<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/reports.blade.php ENDPATH**/ ?>