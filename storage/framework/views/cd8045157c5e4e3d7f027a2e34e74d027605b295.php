<?php $__env->startSection('title', 'Visitor Appointments'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/animate/animate.css')); ?>">
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
            <p>
                All Reports for the organisations using the system
            </p>
        </div>
    </div>


    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Appointments reports for <?php echo e($organisation->name); ?>

                        </h3>

                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete visitor appointments records for this organisation
                            </p>
                            <div class="row pt-1 pb-1">
                                <div class="col-md-6">
                                    <form action="" method="get" id="filtersForm" class="forms">
                                        <div class="input-group">
                                            <input type="text" name="from-to" class="form-control mr-2"
                                                   id="date_filter">
                                            <div class="cs-hidden">
                                                <input type="text" name="report_id" class="form-control mr-2"
                                                       value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt(1006)); ?>">
                                            </div>
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
                                            <i class="feather icon-message-square"></i>Send Messages</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="table-responsive">
                            <table class="table data-list-view dataex-html5-selectors">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>ID Number</th>
                                    <th>Person</th>
                                    <th>Office</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                ?>
                                 <?php $__currentLoopData = $organisation_appoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($appoint->visitor_state!=1 || $appoint->organisation_id!=$organisation->id): ?>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td class="small" title="<?php echo e($appoint->visitor->id); ?>"></td>

                                        <td class="small"><?php echo e($count++); ?></td>
                                        <td class="small"><?php echo e($appoint->visitor->first_name." ".$appoint->visitor->last_name); ?></td>
                                        <td class="small"><?php echo e($appoint->visitor->phone); ?></td>
                                        <td class="small"><?php echo e($appoint->national_id); ?></td>
                                        <td class="small"><?php echo e($appoint->visitor->host); ?></td>
                                        <td class="small"><?php echo e($appoint->visitor->office); ?></td>
                                        <td class="small"><?php echo e(date_format(date_create($visit->dateTime), 'd/m/Y')); ?></td>
                                        <td class="small"><?php echo e(date_format(date_create($visit->dateTime), 'g:i A')); ?></td>
                                        <td class="small"><?php echo e($appoint->status); ?></td>
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
    
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view-reports.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/extensions/sweet-alerts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/popover/popover.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/scripts/pickers/dateTime/daterangepicker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('custom/messaging.js')); ?>"></script>

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
                $.get("view-reports" + "?" + 'from-to=' + searchParams.get('from-to'), function (data, status) {
                    if (data) {

                    }

                });


                // validation code here
                if (!valid) {
                    e.preventDefault();

                }

            });
        });


        //Initialise send messages
        $('.action-sms').on("click", function (e) {
            e.stopPropagation();
            SendMultiMessages("visitor(s)", "<?php echo e(route("email-visitor")); ?>", false)
        });

        //Initialise send emails
        $('.action-mail').on("click", function (e) {
            e.stopPropagation();
            SendMultiEmails("visitor(s)", "<?php echo e(route("email-visitor")); ?>", false)
        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/reports/vis-appointments.blade.php ENDPATH**/ ?>