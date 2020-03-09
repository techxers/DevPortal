<?php $__env->startSection('title', 'Register/Appointment'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vednor css files -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/wickedpicker.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    <!-- Page css files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/forms/wizard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/forms/validation/form-validation.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/wickedpicker.css')); ?>">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- Form wizard with step validation section start -->
    <section id="validation">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title cs-heading "><i
                                    class="feather icon-clipboard"></i> Visitor Registration/Appointments</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="<?php echo e(route('add-visitor')); ?>" name="visRegisterForm"
                                  class="steps-validation wizard-circle">
                                <?php echo csrf_field(); ?>

                                <h6><i class="step-icon fas fa-exclamation"></i> Step 1</h6>
                                <fieldset class="">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 pl-2 pr-2" style="padding-top: 64px;">
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

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-10 pl-2 pr-2" style="padding-bottom: 64px;">
                                            <div class="form-group mt-3">
                                                <div class="table-responsive text-right">
                                                    <input type="checkbox" id="hasAppointmentCheck"> Has an Appointment
                                                    <table id="appointTable" class="table mb-0 text-left pt-1"
                                                           style="display: none">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Count</th>
                                                            <th scope="col">ID Number</th>
                                                            <th scope="col">Host</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Time</th>
                                                            <th scope="col" class="text-red">Appointment</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="visAppointmentsTable">
                                                        <tr>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>No records found</td>
                                                            <td>-</td>
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
                                                    <select type="text" class="form-control"
                                                            name="visOffice" id="visOffice" required>

                                                        <option value=""> Select Office/Department to visit</option>
                                                        <?php $__currentLoopData = explode(",",rtrim($organisation->organisation_config->departments,",")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($depts==""): ?>
                                                                <?php continue; ?>;
                                                            <?php endif; ?>
                                                            <option value="<?php echo e($depts); ?>"><?php echo e($depts); ?></option>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-briefcase"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label for="assetAdd">
                                                    Asset Management
                                                </label>
                                                <div class="input-group">

                                                    <select class="form-control text-muted"
                                                            id="assetAdd" name="assetAdd"
                                                            aria-describedby="button-addon2">
                                                        <option selected value="">No asset selected</option>
                                                        <option>Laptop</option>
                                                        <option>Mobile Phone</option>
                                                        <option>Tablet</option>
                                                        <option>Others</option>

                                                    </select>
                                                    <div class="input-group-append" id="button-addon2">
                                                        <button class="btn btn-transparent border waves-effect waves-light hover"
                                                                type="button" id="assetAddBtn"><i
                                                                    class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-group w-50 mt--4 col-12 col-sm-6 col-md-6">
                                                        <div class="input-group-prepend ">
                                                            <span class="input-group-text bg-transparent"
                                                                  style="border-top: 0!important;font-size: 10px!important;"
                                                                  id="serial-label">Serial No.</span>
                                                        </div>
                                                        <input type="number" class="form-control "
                                                               placeholder="Asset serial no."
                                                               id="assetSerial" name="assetSerial"
                                                               aria-describedby="serial-label" value="Serial Number"
                                                               style="border-top: 0!important;">

                                                    </div>
                                                    <div class="input-group w-50 mt--4 col-12 col-sm-6 col-md-6"
                                                         style="padding-top: 4px">
                                                        <span class="small text-muted">Assets can be entered one by one or multiple separated by comma</span>

                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input visCheckBox"
                                                                   name="visState" id="check1" value="1">
                                                            <label class="custom-control-label"
                                                                   for="check1">Expected <span class="text-muted">(For appointment)</span></label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="" style="padding:16px 0">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input visCheckBox"
                                                                   name="visState" id="check2" value="2" checked>
                                                            <label class="custom-control-label" for="check2">Checked
                                                                in</label>
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

                                            <div class="form-group text-center">
                                                <br>

                                                <table class="table" id="assetsTable">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="3" class="text-capitalize"
                                                            style="font-size: 14px;font-weight: 300">Assets for the
                                                            visitor
                                                        </th>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Asset</th>
                                                        <th>Serial No.</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="small">
                                                        <td></td>
                                                        <td>No asset</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <input value="" type="text" name="assetsHolder" id="assetsHolder"
                                                       class="cs-hidden">
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>

                                <!-- Step 3 -->
                                <h6><i class="step-icon feather icon-user-check"></i> Step 3</h6>
                                <fieldset style="padding: 64px 4px;">
                                    <div class="" id="isExpected">
                                        <div class="row mb-5">
                                            <div class="col-md-8 border-left disabled" disabled="true">
                                                <div class="d-flex">
                                                    <i class="feather icon-calendar"></i>
                                                    <h3 class="pl-2" style="font-weight: 300">Create New
                                                        Appointment</h3>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="appointDate">
                                                                Date
                                                            </label>
                                                            <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                <input type="date" class="form-control timeInputs"
                                                                       placeholder="date of appointment"
                                                                       name="appointDate"
                                                                       id="appointDate">
                                                                <div class="form-control-position">
                                                                    <i class="fa fa-calendar-alt"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="appointTime">
                                                                Time
                                                            </label>
                                                            <fieldset
                                                                    class="form-group position-relative has-icon-left">
                                                                <input type="text"
                                                                       class="form-control timeInputs timepicker"
                                                                       placeholder="time of appointment"
                                                                       name="appointTime"
                                                                       id="appointTime">
                                                                <div class="form-control-position">
                                                                    <i class="fa fa-clock"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="d-flex">
                                                    <i class="feather icon-bell"></i>
                                                    <h3 class="pl-2" style="font-weight: 300">Current Appointments</h3>
                                                </div>

                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <div class="table-responsive text-right">
                                                                    <table
                                                                            class="table mb-0 text-left pt-1">
                                                                        <thead>
                                                                        <tr>
                                                                            <th scope="col">On Date</th>
                                                                            <th scope="col">At time</th>
                                                                            <th scope="col">Host</th>
                                                                            <th scope="col">Department</th>
                                                                            <th scope="col">Visitor Comments</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        <?php $__currentLoopData = \App\Appointment::where("organisation_id",$organisation->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                            <?php if($appoint->status!="pending"): ?>
                                                                                <?php continue; ?>;
                                                                            <?php endif; ?>
                                                                            <tr>

                                                                                <td><?php echo e(date_format(date_create($appoint->dateTime),'l jS F Y')); ?></td>
                                                                                <td><?php echo e(date_format(date_create($appoint->dateTime),'G:ia')); ?></td>
                                                                                <td><?php echo e($appoint->visitor->host); ?></td>
                                                                                <td><?php echo e($appoint->visitor->office); ?></td>
                                                                                <td><?php echo e($appoint->visitor->comments); ?></td>
                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        <?php if(\App\Appointment::where("organisation_id",$organisation->id)->get()->count()<1): ?>
                                                                            <td>-</td>
                                                                            <td colspan="3">No Appointments yet for this
                                                                                organisation
                                                                            </td>
                                                                            <td>-</td>

                                                                        <?php endif; ?>
                                                                        </tbody>
                                                                    </table>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Table head options end -->

                                            </div>
                                        </div>
                                    </div>


                                    <div class="pt-2 pb-3 text-center justify-content-center" id="notExpected">
                                        <div class="form-group text-center">
                                            <br>

                                            <table class="table" id="assetsTable">
                                                <thead>
                                                <tr>
                                                    <th colspan="3" class="text-capitalize"
                                                        style="font-size: 14px;font-weight: 300">Summary of Assets for the
                                                        visitor
                                                    </th>
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Asset</th>
                                                    <th>Serial No.</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="small">
                                                    <td></td>
                                                    <td>No asset</td>
                                                </tr>
                                                </tbody>
                                            </table>
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
    <script type="text/javascript" src="<?php echo e(asset('custom/wickedpicker.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    <!-- Page js files -->
    <script src="<?php echo e(asset('js/scripts/forms/wizard-steps3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/forms/validation/form-validation.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/extensions/sweet-alerts.js')); ?>"></script>


    
    <script type="text/javascript" src="<?php echo e(asset('custom/wickedpicker.js')); ?>"></script>

    <script>
        var pageLoad = true;
        var visForm = document.forms["visRegisterForm"];

        $('#hasAppointmentCheck').change(function () {
            if (this.checked)
                $('#appointTable').css("display", "block");
            else
                $('#appointTable').css("display", "none");


        });
        document.querySelector('#visIdNumber').addEventListener('keyup', function (e) {

            visitorDefaults();
        });


        function visitorDefaults() {


            $.get("/portal/visitor/" + visForm["visIdNumber"].value, function (data, status) {
                var x, y, host, office, dateOfVisit, appointDate, appointTime, appointsTableOut = "";

                if (data) {

                    var visitorMultiArray = data[0];
                    visForm["visFirName"].value = visitorMultiArray[0].first_name;
                    visForm["visLasName"].value = visitorMultiArray[0].last_name;
                    visForm["visEmailAddr"].value = visitorMultiArray[0].email;
                    visForm["visPhoneNo"].value = visitorMultiArray[0].phone;

                    if (data.length > 1) {

                        var appointmentsMultiArray = data[1];

                        for (x = 0; x < appointmentsMultiArray.length; x++) {

                            if (appointmentsMultiArray[x].status !== 'pending')
                                continue;
                            for (y = 0; y < visitorMultiArray.length; y++) {
                                if (appointmentsMultiArray[x].visitor_id === visitorMultiArray[y].id) {
                                    host = visitorMultiArray[y].host;
                                    office = visitorMultiArray[y].office;
                                    dateOfVisit = visitorMultiArray[y].dateOfVisit;
                                    break;
                                }
                            }
                            appointDate = moment(appointmentsMultiArray[x].dateTime).format('ddd, MMM, DD, YYYY');
                            appointTime = moment(appointmentsMultiArray[x].dateTime).format('h:mm a');

                            appointsTableOut +=
                                "<tr>\n" +
                                "<th scope=\"row\">" + (x + 1) + "</th>\n" +
                                "<td>" + appointmentsMultiArray[x].national_id + "</td>\n" +
                                "<td>" + host + "</td>\n" +
                                "<td>" + office + "</td>\n" +
                                "<td>" + appointDate + "</td>\n" +
                                "<td>" + appointTime + "</td>\n" +
                                "<td><input type='radio'  class='appointIndexRadio' name='appointmentIndex' value='" + appointmentsMultiArray[x].visitor_id + "'> </td>\n" +
                                "</tr>"
                        }
                    }
                } else {

                    appointsTableOut +=
                        "<tr>\n" +
                        "<td>-</td>\n" +
                        "<td>-</td>\n" +
                        "<td>No records found</td>\n" +
                        "<td>-</td>\n" +
                        "<td>-</td>\n" +
                        "<td>-</td>\n" +
                        "<td><input type='radio' class='appointIndexRadio'\n" +
                        "name='appointmentIndex' value='-1' disabled></td>\n" +
                        "</tr>"
                }
                if (!isEmpty(appointsTableOut))
                    $("#visAppointmentsTable").html(appointsTableOut);

                $(".appointIndexRadio").change(function () {
                    $.get("appointment/update" + "?" + 'id=' + this.value + "&status=completed", function (data, status) {
                        if (data) {
                            Swal.fire({
                                title: "Welcome",
                                text: "Appointment Completed",
                                type: "success",
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            }).then(function () {
                                window.location.reload();
                            });
                        }

                    })
                });
            });

        }

        function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        var assetArray,countAssets=1;

        $("#assetAddBtn").click(function () {
            var assetName = visForm["assetAdd"].value;
            var assetSerial = visForm["assetSerial"].value;
            if (assetName === "")
                return;
            else if (assetSerial === "") {
                assetSerial = "none";
            }

            if (pageLoad) {
                $('#assetsTable > tbody:last-child').html('')
                pageLoad = false;
            }


            $('#assetsTable > tbody:last-child').append('' +
                '<tr class="small">\n' +
                '<td>'+countAssets++ +'</td>\n' +
                '<td>'+assetName+'</td>\n' +
                '<td>'+assetSerial+'</td>\n' +
                '</tr>');

            visForm["assetsHolder"].value += assetName + "="+assetSerial+",";
            visForm["assetAdd"].value = "";


        });

        $('.timepicker').wickedpicker();

        $(".visCheckBox").change(function () {
            if (visForm['visState'].value === '1') {
                $("#isExpected").css("display", 'block');
                $("#notExpected").css("display", 'none');
            } else {
                $("#isExpected").css("display", 'none');
                $("#notExpected").css("display", 'block');
            }
        });

        $("#isExpected").css("display", 'none');
        $("#notExpected").css("display", 'block');

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Techxers\Neutron\resources\views/portal/create-appointments.blade.php ENDPATH**/ ?>