<?php $__env->startSection('title', 'Register Visitor'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vednor css files -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    <!-- Page css files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/forms/wizard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/forms/validation/form-validation.css')); ?>">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Form wizard with step validation section start -->
    <section id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title cs-heading "><i
                                    class="feather icon-clipboard"></i> Visitor Registration</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="<?php echo e(route('visitor-create')); ?>" name="visRegisterForm"
                                  class="steps-validation wizard-circle">
                                <?php echo csrf_field(); ?>

                                <h6><i class="step-icon fas fa-exclamation"></i> Step 1</h6>
                                <fieldset class="">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8" style="padding: 64px 4px;">
                                            <div class="form-group">
                                                <label for="idNumber" class="text-center cs-text-shadow-white"
                                                       style="font-size: 20px;">
                                                    Visitor ID Number <span class="text-red">*</span>
                                                </label>
                                                <div class="controls">
                                                    <input type="text" name="idNumber" id="idNumber"
                                                           class="form-control"
                                                           data-validation-regex-regex="([^a-z]*[A-Z]*)*"
                                                           data-validation-containsnumber-regex="([^0-9]*[0-9]+)+"
                                                           data-validation-required-message="This field cannot be empty"
                                                           maxlength="15" minlength="5"
                                                           placeholder="Enter a valid ID number" value=""
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- Step 1 -->
                                <h6><i class="step-icon fas fa-question"></i> Step 2</h6>
                                <fieldset style="padding: 64px 4px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstVisName">
                                                    First Name
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="firstVisName"
                                                           placeholder="Visitor First Name"
                                                           name="firstVisName" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastVisName">
                                                    Last Name
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="lastVisName"
                                                           placeholder="Visitor Last Name"
                                                           name="lastVisName" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visEmail">
                                                    Email address
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="email" class="form-control text-lowercase"
                                                           id="visEmail"
                                                           placeholder="Email of Visitor"
                                                           name="visEmail" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visPhone">
                                                    Mobile Number
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control" placeholder="Mobile number"
                                                           required name="visPhone" id="visPhone">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-smartphone"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group border-right">
                                                <label for="personToVis">
                                                    Person/Host
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="personToVis"
                                                           placeholder="Person to visit"
                                                           name="personToVis" required list="hosts">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-users"></i>
                                                    </div>
                                                    <datalist id="hosts">
                                                        <?php $__currentLoopData = \App\Visitor::select('host')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($list['host']); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </datalist>
                                                </fieldset>
                                                <label for="visOffice">
                                                    Department/Office
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control"
                                                           placeholder="Office/Department to visit" required
                                                           name="visOffice" id="visOffice" list="office">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-briefcase"></i>
                                                    </div>
                                                    <datalist id="office">
                                                        <?php $__currentLoopData = \App\Visitor::select('office')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($list['office']); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </datalist>
                                                </fieldset>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visCheck1" id="check1" checked value="1">
                                                            <label class="custom-control-label"
                                                                   for="check1">Expected</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="" style="padding:16px 0">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visCheck1" id="check2" value="2">
                                                            <label class="custom-control-label" for="check2">Checked
                                                                in</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visCheck1" id="check3" value="3">
                                                            <label class="custom-control-label" for="check3">Checked
                                                                out</label>
                                                        </div>
                                                    </fieldset>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="comment">Comments</label>
                                                    <textarea name="comment" id="comment" rows="4"
                                                              class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Step 3 -->
                                <h6><i class="step-icon feather icon-user-check"></i> Step 3</h6>
                                <fieldset style="padding: 64px 4px;">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3>Current User information</h3>

                                            <div class="card">
                                                <div class="card-header">
                                                    <p class="card-title" style="font-weight: 200!important;">If no
                                                        appointments are needed just click on submit</p>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover-animation mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Index</th>
                                                                    <th scope="col">ID Number</th>
                                                                    <th scope="col">Host</th>
                                                                    <th scope="col">Department</th>
                                                                    <th scope="col">Appointment</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="listAppsTable">
                                                                <tr>
                                                                    <td><p class="text-red">There are no appointments</p></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Table head options end -->

                                        </div>
                                        <div class="col-md-4 border-left disabled" disabled="true">
                                            <div class="d-flex justify-content-between placecheckbox">
                                                <h3>New Appointment</h3>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="appointDate">
                                                    Date
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="date" class="form-control timeInputs"
                                                           placeholder="date of appointment" name="appointDate"
                                                           id="appointDate">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="appointTime">
                                                    Time
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="time" class="form-control timeInputs"
                                                           placeholder="time of appointment" name="appointTime"
                                                           id="appointTime">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </fieldset>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>















                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form wizard with step validation section end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <!-- vednor files -->
    <script src="<?php echo e(asset('vendors/js/extensions/jquery.steps.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>

    <script src="<?php echo e(asset('vendors/js/forms/validation/jqBootstrapValidation.js')); ?>"></script>

    <script src="<?php echo e(asset('vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/extensions/polyfill.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    <!-- Page js files -->
    <script src="<?php echo e(asset('js/scripts/forms/wizard-steps.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/forms/validation/form-validation.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/extensions/sweet-alerts.js')); ?>"></script>

    <script>
        $('.timeInputs').css('display','none');
        var checkDisabled=true;
        $('.placecheckbox').append("<input type='checkbox' id='appointCheck' name='appointCheck' >").change(function(){
            checkDisabled=!checkDisabled;
            if(!checkDisabled){
                $('.timeInputs').css('display','block');
            }
            else{
                $('.timeInputs').css('display','none');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/registerVisitor.blade.php ENDPATH**/ ?>