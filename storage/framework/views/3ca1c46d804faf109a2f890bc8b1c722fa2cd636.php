<?php $__env->startSection('title', 'Appointments'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('js/scripts/pickers/dateTime/daterangepicker.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <p>System will send an

                <?php if($organisation->organisation_config->defaultNote=="email"): ?> EMAIL <?php endif; ?>
                <?php if($organisation->organisation_config->defaultNote=="both"): ?> EMAIL and SMS <?php endif; ?>
                <?php if($organisation->organisation_config->defaultNote=="sms"): ?> SMS <?php endif; ?>
                automatically, one day before the actual appointment date.
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Your appointments scheduled so far</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors appointments of this organisation
                            </p>

                            <div class="row pt-1 pb-1">
                                <div class="col-md-6">
                                    <form action="" method="get" id="filtersForm" class="forms">
                                        <div class="input-group">
                                            <input type="text" name="from-to" class="form-control mr-2"
                                                   id="date_filter">
                                            <span class="input-group-btn">
                                                <input type="submit" class="btn btn-primary" value="Filter">
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    <section id="data-list-view" class="data-list-view-header">
                        <div class="action-btns d-none">
                            <div class="btn-dropdown mr-1 mb-1">
                                <div class="btn-group dropdown actions-dropodown">
                                    <button type="button"
                                            class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item action-mail" href="javascript:void(0)">
                                            <i class="feather icon-mail"></i>Send Emails</a>
                                        <a class="dropdown-item action-sms" href="javascript:void(0)">
                                            <i class="feather icon-send"></i>Send Notifications</a>
                                        <a class="dropdown-item action-complete" href="javascript:void(0)">
                                            <i class="feather icon-check"></i>Complete Appointments</a>
                                        <a class="dropdown-item action-reject" href="javascript:void(0)">
                                            <i class="feather icon-x"></i>Reject Appointments</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="table-responsive">
                            <table class="table data-list-view">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>

                                    <th>Name</th>

                                    <th>Host</th>
                                    <th>Dept.</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Days</th>
                                    <th>Notification</th>
                                    <th>Status</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-allAdmins', $user)): ?>
                                        <th>Notify</th>
                                    <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=0;
                                ?>
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td title="<?php echo e($appoint->id); ?>"><span class="test"></span></td>
                                        <td><?php echo e($i+=1); ?></td>

                                        <td><?php echo e($appoint->visitor->first_name." ".$appoint->visitor->last_name); ?></td>
                                        <td><?php echo e($appoint->visitor->host); ?></td>
                                        <td><?php echo e($appoint->visitor->office); ?></td>
                                        <td style="font-size: 12px"><?php echo e(date_format(date_create($appoint->dateTime), 'l jS F Y')); ?></td>
                                        <td><?php echo e(date_format(date_create($appoint->dateTime), 'g:i A')); ?></td>
                                        <td>
                                            <?php
                                                $datetime1 = new DateTime(date("Y-m-d H:i:s"));
                                                $datetime2 =new DateTime($appoint->dateTime);

                                                $interval = $datetime2->diff($datetime1);
                                                echo abs($interval->format('%R%a days'));
                                            ?>
                                            days
                                        </td>
                                        <td class="center text-center">
                                            <?php if($appoint->notified<1): ?>
                                                <div class="badge badge-pill badge-danger float-right mr-2">
                                                    <i class="fa fa-close"></i>
                                                </div>
                                            <?php else: ?>
                                                <div class="badge badge-pill badge-primary float-right mr-2">
                                                    <i class="fa fa-check"></i>
                                                </div>

                                            <?php endif; ?>
                                        </td>
                                        <td>


                                            <?php if($appoint->status!="pending"): ?>
                                                <select class="p-0 m-0 form-control  staff-input btn  waves-effect waves-light appointMgt <?php if($appoint->status=="completed"): ?> btn-primary <?php elseif($appoint->status=="rejected"): ?> btn-danger <?php endif; ?>"
                                                        name="<?php echo e($appoint->id); ?>"
                                                        style="width: 100px;font-size: 11px"
                                                        disabled data-toggle="popover"
                                                        data-content="<?php echo e($appoint->comments); ?>"
                                                        data-trigger="hover" data-original-title="Action comments">
                                                    <option selected value="<?php echo e($appoint->status); ?>">
                                                        <?php echo e($appoint->status); ?>

                                                    </option>

                                                </select>
                                            <?php else: ?>

                                                <select class="p-0 m-0 form-control  staff-input btn  waves-effect waves-light appointMgt btn-warning "
                                                        name="<?php echo e($appoint->id); ?>"
                                                        style="width: 100px;font-size: 11px">
                                                    <option value="completed">
                                                        Completed
                                                    </option>
                                                    <option value="pending" selected>
                                                        Pending
                                                    </option>
                                                    <option value="rejected">

                                                        Rejected
                                                    </option>
                                                </select>

                                            <?php endif; ?>


                                        </td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-allAdmins', $user)): ?>
                                            <td>
                                                <button class="btn  btn-primary waves-effect waves-light btn-sm pl-1 pr-1 sendNotify"
                                                        title="<?php echo e($appoint->id); ?>" <?php if($role->id>2): ?> disabled <?php endif; ?>>
                                                    <i class="feather icon-send"></i>
                                                </button>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </section>
                    
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
    <script src="<?php echo e(asset('vendors/js/tables/datatable/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/tables/datatable/datatables.checkboxes.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
    <script src="<?php echo e(asset('vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/datatables/datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view-appoints.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/extensions/sweet-alerts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/popover/popover.js')); ?>"></script>

    <script>
        $(".appointMgt").change(function () {
            var val = this.value;
            var thisSelect = this;
            var name = this.name;

            if (val === 'rejected') {
                Swal.fire({
                    title: 'Reason for rejection',
                    input: "textarea",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    cancelButtonClass: "btn btn-danger ml-1",
                }).then(function (result) {
                    if (result.value) {
                        var removeEvent = calendarSystem.getEventById('newEvent');
                        $.get("appointment/update" + "?" + 'id=' + name + "&status=rejected&comments=" + result.value, function (data, status) {
                            if (data) {
                                Swal.fire({
                                    title: "Success",
                                    text: "Appointment " + val,
                                    type: "success",
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                }).then(function () {
                                    thisSelect.disabled = true;
                                });
                            }

                        })
                    }
                });
            } else {

                $.get("appointment/update" + "?" + 'id=' + this.name + "&status=" + this.value + "", function (data, status) {
                    if (data) {

                        Swal.fire({
                            title: "Success",
                            text: "Appointment " + val,
                            type: "success",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        }).then(function () {
                            thisSelect.disabled = true;
                        });
                    }

                })
            }

        });

        $(".sendNotify").click(function () {
            var notify = this.value;
            var btnTitle = this.title;
            Swal.fire({
                title: 'Sending Notification',
                text: 'You can change the defaults below',
                input: "textarea",
                inputValue: '<?php echo e($organisation->organisation_config->notify_message); ?>',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Send',
                cancelButtonClass: "btn btn-danger ml-1",
            }).then(function (result) {
                if (result.value) {
                    notify.disabled = true;
                    $.get("appointment/notify" + "?" + 'id=' + btnTitle + "&sms=" + result.value, function (data, status) {
                        if (data) {

                            Swal.fire({
                                title: 'Notification sent',
                                text: data,
                                animation: false,
                                customClass: 'animated bounceIn',
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            }).then(function () {
                                notify.disabled = false;
                                window.location.reload();
                            });
                        }

                    })
                }
            });
        });

    </script>



    <script type="text/javascript" src="<?php echo e(asset('js/scripts/pickers/dateTime/daterangepicker.js')); ?>"></script>
    <script>
        $(function () {
            let searchParams = new URLSearchParams(window.location.search)
            let dateInterval = searchParams.get('from-to');
            let start = moment().subtract(29, 'days');
            let end = moment().add(29, 'days');

            if (dateInterval) {
                dateInterval = dateInterval.split(' - ');
                start = dateInterval[0];
                end = dateInterval[1];
            }

            $('#date_filter').daterangepicker({
                "showDropdowns": true,
                "showWeekNumbers": true,
                "alwaysShowCalendars": true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'YYYY-MM-DD',
                    firstDay: 1,
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'This Year': [moment().startOf('year'), moment().endOf('year')],
                    'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                    'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
                }
            });

                    
            let dtOverrideGlobals = {};
            $('.datatable-Transaction').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        });


        $(document).ready(function () {
            $('#filtersForm').on('submit', function (e) {
                //portal/appointments
                $.get("appointments" + "?" + 'from-to=' + searchParams.get('from-to'), function (data, status) {
                    if (data) {

                    }

                });


                // validation code here
                if (!valid) {
                    e.preventDefault();

                }

            });
        });


        /*****************Multiple Notification*********************/
        $('.action-sms').on("click", function (e) {
            e.stopPropagation();
            Swal.fire({
                title: 'Sending Notifications',
                text: 'You can change the defaults below',
                input: "textarea",
                inputValue: '<?php echo e($organisation->organisation_config->notify_message); ?>',
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Send',
                cancelButtonClass: "btn btn-danger ml-1",
            }).then(function (result) {
                if (result.value) {

                    let checkboxes = document.getElementsByClassName('dt-checkboxes');
                    var initCheckboxCount = 0;
                    var finalCheckboxCount = 0;

                    for (var i = 0; i < checkboxes.length; i++) {
                        if (!checkboxes[i].checked)
                            continue;
                        initCheckboxCount++;

                        var btnTitle = checkboxes[i].closest('td').title;

                        $.get("appointment/notify" + "?" + 'id=' + btnTitle + "&sms=" + result.value, function (data, status) {
                            if (data) {
                                finalCheckboxCount++;

                            }

                        })
                    }
                    if (initCheckboxCount > 0) {
                        Swal.fire({
                            title: initCheckboxCount + ' Notifications sent',
                            animation: false,
                            customClass: 'animated bounceIn',
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                }
            });
        });
        /*****************Multiple Notification*********************/


        /*****************Multiple Notification*********************/
        $('.action-mail').on("click", function (e) {
            e.stopPropagation();

            const {value: formValues} = swal.fire({
                title: 'Sending Notification Emails',
                html:
                    ' <div class="col-sm-12 data-field-col pt-2">\n' +
                    '                                                    <div><input type="text" style="visibility: hidden" autofocus></div>' +
                    '                                                    <label for="data-name" style="font-size: 18px">Subject</label>\n' +
                    '                                                    <input type="text" class="form-control pt-2" name="subject"\n' +
                    '                                                           id="email-subject"\n' +
                    '                                                           value="Hey, %firstname did you hear? " required>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-sm-12 data-field-col pt-2">\n' +
                    '                                                    <label for="data-price" style="font-size: 18px">Message</label>\n' +
                    '                                                    <textarea type="text" class="form-control" name="message"\n' +
                    '                                                              id="email-message" rows="12"\n' +
                    '                                                              style="text-align: left;align-content:start" required>Dear %lastname, &#013;&#013;We hope you’re doing well. We wanted to remind you that your next appointment with %company is scheduled for %date. We look forward to seeing you then. &#013;&#013;Please remember to arrive on time at %time. &#013;&#013;We truly care about your well-being, so if you have any questions or needs in advance of your appointment, you are welcome to call us anytime at %phone. One of our representatives will get back to you as soon as possible. &#013; &#013;Warm regards, &#013;&#013;%company\n' +
                    '                                                    </textarea>\n' +
                    '                                                </div>\n',
                focusConfirm: false,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonClass: "btn btn-danger ml-1"
            }).then(function (result) {

                let checkboxes = document.getElementsByClassName('dt-checkboxes');
                var initCheckboxCount = 0;
                var finalCheckboxCount = 0;

                for (var i = 0; i < checkboxes.length; i++) {
                    if (!checkboxes[i].checked)
                        continue;
                    initCheckboxCount++;


                    var btnTitle = checkboxes[i].closest('td').title;

                    $.ajax({
                        type: "POST",
                        data: {
                            "subject": document.getElementById('email-subject').value,
                            "message": document.getElementById('email-message').value,
                            "id": btnTitle
                        },
                        url: '<?php echo e(route('send-notify-mail')); ?>',
                        success: successFunc,
                        error: errorFunc
                    });

                    function successFunc(data, status) {
                        Swal.fire({
                            title: "Success",
                            text: "Email Notification Sent "+data,
                            type: "success",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        }).then(function () {
                                window.location.reload();
                            });
                    }

                    function errorFunc(data, status) {
                        console.log(data);
                        Swal.fire({
                            title: "Error!",
                            text: " Notification not sent ",
                            type: "error",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                    }
                }
            });

        });


        /*****************Multiple Notification*********************/

        /*****************Multiple Rejection*********************/
        $('.action-reject').on("click", function (e) {
            e.stopPropagation();
            Swal.fire({
                title: 'Reason for rejection',
                input: "textarea",
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonClass: "btn btn-danger ml-1",
            }).then(function (result) {
                if (result.value) {

                    let checkboxes = document.getElementsByClassName('dt-checkboxes');
                    var initCheckboxCount = 0;
                    var finalCheckboxCount = 0;

                    for (var i = 0; i < checkboxes.length; i++) {
                        if (!checkboxes[i].checked)
                            continue;
                        initCheckboxCount++;


                        var btnTitle = checkboxes[i].closest('td').title;

                        $.get("appointment/update" + "?" + 'id=' + btnTitle + "&status=rejected&comments=" + result.value, function (data, status) {
                            if (data) {

                                finalCheckboxCount++;
                            }

                        })
                    }
                    if (initCheckboxCount > 0) {
                        Swal.fire({
                            title: initCheckboxCount + ' Appointments Rejected',
                            animation: false,
                            customClass: 'animated bounceIn',
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                }
            });
        });
        /*****************Multiple Rejection*********************/


        /*****************Multiple Completed*********************/
        $('.action-complete').on("click", function (e) {
            e.stopPropagation();

            let checkboxes = document.getElementsByClassName('dt-checkboxes');
            var initCheckboxCount = 0;
            var finalCheckboxCount = 0;


            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked)
                    continue;
                initCheckboxCount++;

                var btnTitle = checkboxes[i].closest('td').title;

                $.get("appointment/update" + "?" + 'id=' + btnTitle + "&status=" + 'completed' + "", function (data, status) {
                    if (data) {

                        finalCheckboxCount++;
                    }

                })
            }
            if (initCheckboxCount > 0) {
                Swal.fire({
                    title: initCheckboxCount + ' Appointments Completed',
                    animation: false,
                    customClass: 'animated bounceIn',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                }).then(function () {
                    window.location.reload();
                });
            }

        })
        /*****************Multiple Completed*********************/
        ;

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/appointments.blade.php ENDPATH**/ ?>