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
                                                <label for="visIdNumber" class="text-center cs-text-shadow-white"
                                                       style="font-size: 20px;">
                                                    Visitor ID Number/Passport <span class="text-red">*</span>
                                                </label>
                                                <div class="controls">
                                                    <input type="text" name="visIdNumber" id="visIdNumber"
                                                           class="form-control"
                                                           data-validation-regex-regex="([^a-z]*[A-Z]*)*"
                                                           data-validation-containsnumber-regex="([^0-9]*[0-9]+)+"
                                                           data-validation-required-message="This field cannot be empty"
                                                           maxlength="15" minlength="5"
                                                           placeholder="Enter a valid ID number" value=""
                                                           required>
                                                </div>

                                            </div>
                                            <div class="form-group mt-3">
                                                <div class="table-responsive text-right">

                                                    <input type="checkbox" id="hasAppointmentCheck"> Has an Appointment
                                                    <table id="appointTable" class="table mb-0 text-left"
                                                           style="display: none">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Count</th>
                                                            <th scope="col">ID Number</th>
                                                            <th scope="col">Host</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Appointment</th>
                                                            <th scope="col" class="text-red">Current</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="visAppointmentsTable">
                                                        <tr>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>No records found</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td><input type='radio' class='appointIndexRadio'
                                                                       name='appointmentIndex' value='-1' disabled></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
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
                                                <label for="visFirName">
                                                    First Name
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="visFirName"
                                                           placeholder="Visitor First Name"
                                                           name="visFirName" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visLasName">
                                                    Last Name
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="visLasName"
                                                           placeholder="Visitor Last Name"
                                                           name="visLasName" required>
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
                                                <label for="visEmailAddr">
                                                    Email address
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="email" class="form-control text-lowercase"
                                                           id="visEmailAddr"
                                                           placeholder="Email of Visitor"
                                                           name="visEmailAddr" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visPhoneNo">
                                                    Mobile Number
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control" placeholder="Mobile number"
                                                           required name="visPhoneNo" id="visPhoneNo">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-smartphone"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visHost">
                                                    Person/Host
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control text-capitalize"
                                                           id="visHost"
                                                           placeholder="Person to visit"
                                                           name="visHost" required list="visHostLists">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-users"></i>
                                                    </div>
                                                    <datalist id="visHostLists">
                                                        <?php $__currentLoopData = \App\Visitor::select('host')->distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visHostList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($visHostList['host']); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </datalist>
                                                </fieldset>
                                                <label for="visOffice">
                                                    Department/Office
                                                </label>
                                                <fieldset class="form-group position-relative has-icon-left required">
                                                    <input type="text" class="form-control"
                                                           placeholder="Office/Department to visit" required
                                                           name="visOffice" id="visOffice" list="visOfficeLists">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-briefcase"></i>
                                                    </div>
                                                    <datalist id="visOfficeLists">
                                                        <?php $__currentLoopData = \App\Visitor::select('office')->distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visOfficeList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($visOfficeList['office']); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </datalist>
                                                </fieldset>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visState" id="check1" checked value="1">
                                                            <label class="custom-control-label"
                                                                   for="check1">Expected</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="" style="padding:16px 0">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visState" id="check2" value="2">
                                                            <label class="custom-control-label" for="check2">Checked
                                                                in</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                   name="visState" id="check3" value="3">
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
                                                    <label for="visComment">Comments</label>
                                                    <textarea name="visComment" id="visComment" rows="4"
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
                                            <h3>Current Appointments Scheduled</h3>

                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Index</th>
                                                                    <th scope="col">ID_Number</th>
                                                                    <th scope="col">Host</th>
                                                                    <th scope="col">Department</th>
                                                                    <th scope="col">Appointment</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="listAppsTable">
                                                                <tr>
                                                                    <?php $__currentLoopData = \App\Visitor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <td>1</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        $('.timeInputs').css('display', 'none');
        var checkDisabled = true;
        $('.placecheckbox').append("<input type='checkbox' id='appointCheck' name='appointCheck' >").change(function () {
            checkDisabled = !checkDisabled;
            if (!checkDisabled) {
                $('.timeInputs').css('display', 'block');
            } else {
                $('.timeInputs').css('display', 'none');
            }
        });


        $('#hasAppointmentCheck').change(function () {
            if (this.checked)
                $('#appointTable').css("display", "block");
            else
                $('#appointTable').css("display", "none");
            visitorDefaults();

        });

        function visitorDefaults() {


            var visForm = document.forms["visRegisterForm"];

            $.get("visitor/" + visForm["visIdNumber"].value, function (data, status) {
                dataFetched = !dataFetched;
                if (data) {
                    visForm["visFirName"].value = data[0].first_name;
                    visForm["visLasName"].value = data[0].last_name;
                    visForm["visEmailAddr"].value = data[0].email;
                    visForm["visPhoneNo"].value = data[0].phone;

                    let i, tableOut = "";

                    if (data[1].length > 0) {
                        for (i = 0; i < data[1].length; i++) {
                            tableOut +=
                                "<tr>\n" +
                                "<th scope=\"row\">" + (i + 1) + "</th>\n" +
                                "<td>" + data[1][0].national_id + "</td>\n" +
                                "<td>" + data[0].host + "</td>\n" +
                                "<td>" + data[0].office + "</td>\n" +
                                "<td>" + data[1][0].appointment_dateTime + "</td>\n" +
                                "<td><input type='radio'  class='appointIndexRadio' name='appointmentIndex' value='" + data[1][0].id + "'> </td>\n" +
                                "</tr>"


                        }

                        $("#visAppointmentsTable").html(tableOut);
                    }
                }


            });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/register-visitor.blade.php ENDPATH**/ ?>