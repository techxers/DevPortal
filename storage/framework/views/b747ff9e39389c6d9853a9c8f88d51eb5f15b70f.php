<?php $__env->startSection('title', 'App Calender'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- Vendor css files -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/calendars/fullcalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/calendars/extensions/daygrid.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/calendars/extensions/timegrid.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/pickers/pickadate/pickadate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mystyle'); ?>
    <!-- Page css files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/calendars/fullcalendar.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Full calendar start -->
    <section id="basic-examples">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="cal-category-bullets d-none">
                                <div class="bullets-group-1 mt-2">
                                    <div class="category-business mr-1">
                                        <span class="bullet bullet-success bullet-sm mr-25"></span>
                                        Business
                                    </div>
                                    <div class="category-work mr-1">
                                        <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                        Work
                                    </div>
                                    <div class="category-personal mr-1">
                                        <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                        Personal
                                    </div>
                                    <div class="category-others">
                                        <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                        Others
                                    </div>
                                </div>
                            </div>
                            <div id='fc-calendarSystem'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- calendar Modal starts-->
        <div class="modal fade text-left modal-calendar" tabindex="-1" role="dialog" aria-labelledby="cal-modal"
             aria-modal="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-text-bold-600" id="cal-modal">View Calendar Event</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <form action="#">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between align-items-center add-category">
                                <div class="chip-wrapper"></div>
                                <div class="label-icon pt-1 pb-2 dropdown calendar-dropdown">
                                    <i class="feather icon-tag dropdown-toggle" id="cal-event-category"
                                       data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cal-event-category">
                  <span class="dropdown-item business" data-color="success">
                    <span class="bullet bullet-success bullet-sm mr-25"></span>
                    Business
                  </span>
                                        <span class="dropdown-item work" data-color="warning">
                    <span class="bullet bullet-warning bullet-sm mr-25"></span>
                    Work
                  </span>
                                        <span class="dropdown-item personal" data-color="danger">
                    <span class="bullet bullet-danger bullet-sm mr-25"></span>
                    Personal
                  </span>
                                        <span class="dropdown-item others" data-color="primary">
                    <span class="bullet bullet-primary bullet-sm mr-25"></span>
                    Others
                  </span>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="form-label-group mt-2">
                                <input type="text" style="font-size: 24px" class="form-control border-0"
                                       id="cal-event-title" placeholder="Event Title" readonly>
                                <label for="cal-event-title" readonly>Event Title</label>
                            </fieldset>
                            <fieldset class="form-label-group">
                                <input type="text" style="font-size: 20px" class="form-control border-0 pickadate"
                                       id="cal-start-date" placeholder="Start Date" readonly>
                                <label for="cal-start-date">Event Date</label>
                            </fieldset>
                            <fieldset class="form-label-group cs-hidden">
                                <input type="text" class="form-control pickadate" id="cal-end-date"
                                       placeholder="End Date">
                                <label for="cal-end-date">End Date</label>
                            </fieldset>
                            <fieldset class="form-label-group">
                                <textarea readonly class="form-control" id="cal-description" rows="3"
                                          placeholder="Description"></textarea>
                                <label for="cal-description">Description</label>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary cal-add-event waves-effect waves-light"
                                    disabled>
                                Add Event
                            </button>
                            <button type="button"
                                    class="btn btn-primary d-none - waves-effect waves-light"
                                    disabled>Ok
                            </button>
                            <button type="button" class="btn btn-flat-danger cancel-event waves-effect waves-light"
                                    data-dismiss="modal">Cancel
                            </button>
                            <button type="button"
                                    class="btn btn-danger remove-event d-none waves-effect waves-light"
                                    data-dismiss="modal">Reject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- calendar Modal ends-->
    </section>
    <!-- // Full calendar end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <!-- Vendor js files -->
    <script src="<?php echo e(asset('vendors/js/extensions/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/extensions/daygrid.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/extensions/timegrid.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/extensions/interactions.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.date.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>


    <script type="text/javascript">
        var calendarSystem;
        var calSystemCategory;
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscript'); ?>
    <!-- Page js files -->
    <script src="<?php echo e(asset('js/scripts/extensions/sweet-alerts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/extensions/fullcalendar.js')); ?>"></script>
    <script>
        var colors = {
            primary: "#7367f0",
            success: "#28c76f",
            danger: "#ea5455",
            warning: "#ff9f43"
        };
        calSystemCategory = {
            primary: "Others",
            success: "Business",
            danger: "Appointments",
            warning: "Work"
        };

        window.onload = function () {
                    <?php
                        $appointments = \App\Appointment::where('organisation_id', $organisation->id)->get();
                    ?>

                    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(($appoint->status)!="pending"): ?>
                        <?php continue; ?>
                    <?php endif; ?>


            var eventTitle = "Appointment\n<?php echo e($appoint->visitor->first_name." ".$appoint->visitor->last_name); ?>\n<?php echo e(date_format(date_create($appoint->date_of_visit), 'g:i A')); ?>",
                startDate = '<?php echo e($appoint->dateTime); ?>',
                endDate = '<?php echo e($appoint->dateTime); ?>',
                eventDescription = 'Appointment in <?php echo e($appoint->visitor->office); ?> office to see the <?php echo e($appoint->visitor->host); ?>',
                correctEndDate = new Date(endDate);
            calendarSystem.addEvent({
                id: "newEvent",
                title: eventTitle,
                start: startDate,
                end: correctEndDate,
                database_id: '<?php echo e($appoint->id); ?>',
                description: eventDescription,
                color: colors.danger,
                dataEventColor: "danger",
                allDay: true
            });

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        };


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/calendar-system.blade.php ENDPATH**/ ?>