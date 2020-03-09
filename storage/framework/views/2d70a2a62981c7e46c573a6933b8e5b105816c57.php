<?php $__env->startSection('title', 'Visitors'); ?>

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
                This shows the list of visitors, who had visited the organisation depending on the specified time period
                of the filter
            </p>
        </div>
    </div>



    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Visitors who visited <?php echo e($organisation->name); ?> so far</h3>
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

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">
                                Contains complete record concerning all visitors data of this organisation
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
                                        <a class="dropdown-item action-checkout" href="javascript:void(0)">
                                            <i class="feather icon-log-out"></i>Checkout visitors</a>

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
                                    <th>Office</th>
                                    <th>Phone</th>
                                    <th>ID</th>

                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Appointment</th>
                                    <th>Assets</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=0;
                                ?>
                                <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="small" title="<?php echo e($visit->id); ?>"><span class="test"></span></td>
                                        <td class="small"><?php echo e($i+=1); ?></td>

                                        <td class="small"><?php echo e($visit->first_name." ".$visit->last_name); ?></td>
                                        <td class="small"><?php echo e($visit->host); ?></td>
                                        <td class="small"><?php echo e($visit->office); ?></td>
                                        <td class="small"><?php echo e($visit->phone); ?></td>
                                        <td class="small"><?php echo e($visit->national_id); ?></td>

                                        <td class="small"><?php echo e(date_format(date_create($visit->time_in), 'g:ia')); ?></td>
                                        <td class="small"><?php if($visit->time_out==null): ?>
                                                NA <?php else: ?> <?php echo e(date_format(date_create($visit->time_out), 'g:ia')); ?> <?php endif; ?></td>
                                        <td class="small">

                                            <?php if(\App\Appointment::where('visitor_id',$visit->id)->get()->count()>0): ?>
                                                <div class="badge badge-pill badge-primary float-right mr-2">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            <?php else: ?>
                                                <div class="badge badge-pill badge-danger float-right mr-2">
                                                    <i class="fa fa-close"></i>
                                                </div>
                                            <?php endif; ?>

                                        </td>
                                        <td class="small">
                                            <div class="dropdown">
                                                <a class="btn-sm btn-icon-only text-light" href="#"
                                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">
                                                    <i class="fas fa-th fa-2x  <?php if(\App\Asset::where([["organisation_id","=",$visit->organisation_id],["visitor_id","=",$visit->id]],["date_of_visit","=",$visit->date_of_visit])->count()>0): ?> text-blue <?php else: ?> text-gray <?php endif; ?>"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <?php
                                                        $assetCount=0;
                                                    ?>
                                                    <div class="" style="padding: 4px">
                                                        <?php if(\App\Asset::where([["organisation_id","=",$visit->organisation_id],["visitor_id","=",$visit->id]],["date_of_visit","=",$visit->date_of_visit])->count()>0): ?>
                                                            <div>
                                                                <table class="table pl-1 pr-1">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Asset</th>
                                                                        <th>Serial</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php $__currentLoopData = \App\Asset::where([["organisation_id","=",$visit->organisation_id],["visitor_id","=",$visit->id]],["date_of_visit","=",$visit->date_of_visit])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <tr>
                                                                            <td>
                                                                                <?php echo e($asset->name); ?>

                                                                            </td>
                                                                            <td>
                                                                                <?php echo e($asset->serial); ?>

                                                                            </td>
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                       class="form-check form-control"
                                                                                       <?php if($asset->status): ?> checked <?php endif; ?> >
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="">
                                                                    Had no assets
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="small">
                                            <button type="button"
                                                    class="btn btn-sm <?php if($visit->visitor_state==1): ?> btn-secondary <?php elseif($visit->visitor_state==2): ?> btn-success manageVisitState <?php else: ?> btn-neutral  disabled <?php endif; ?>  waves-effect waves-light"
                                                    title="<?php echo e($visit->id); ?>">
                                                <?php
                                                    if($visit->visitor_state==1){
                                                    echo("Expected");
                                                    }elseif ($visit->visitor_state==2){
                                                    echo("Checked in");
                                                    }else{
                                                     echo("Checked out");
                                                    }
                                                ?>
                                            </button>
                                        </td>
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
    <script type="text/javascript" src="<?php echo e(asset('custom/messaging.js')); ?>"></script>
    <script>
        $(".manageVisitState").on('click', function () {
            var visID = this.title;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Check out!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling:
                    false,
            }).then(function (result) {
                if (result.value) {

                    $.get('<?php echo e(route("update-visitor")); ?>?' + "id=" + visID, function (data, status) {

                            if (data) {
                                Swal.fire({
                                    type: "success",
                                    title: 'Checked out',
                                    text: 'Visitor has been checked out.',
                                    confirmButtonClass: 'btn btn-success',
                                }).then(function () {
                                    window.location.reload();
                                });


                            }
                        }
                    );

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Checking out visitor cancelled',
                        type: 'error',
                        confirmButtonClass: 'btn btn-success',
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
                //portal/visitors
                $.get("visitors" + "?" + 'from-to=' + searchParams.get('from-to'), function (data, status) {
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
            SendMultiMessages("visitor(s)","<?php echo e(route("message-visitor")); ?>",false)
        });

        //Initialise send emails
        $('.action-mail').on("click", function (e) {
            e.stopPropagation();
            SendMultiEmails("visitor(s)","<?php echo e(route("email-visitor")); ?>",false)
        });

        /*****************Checking out visitors*********************/
        $('.action-checkout').on("click", function (e) {
            e.stopPropagation();

            let checkboxes = document.getElementsByClassName('dt-checkboxes');
            var checkedCount = 0, checkedOutCount = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked)
                    continue;
                checkedCount++;

                var checkIDTitle = checkboxes[i].closest('td').title;

                $.get('<?php echo e(route("update-visitor")); ?>?' + "id=" + checkIDTitle, function (data, status) {
                    if (data) {
                        checkedOutCount++;
                    }

                })
            }
            if (checkedCount > 0) {
                Swal.fire({
                    title: checkedCount + ' Visitors Checked Out',
                    animation: false,
                    customClass: 'animated bounceIn',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                }).then(function () {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    title: "Warning!",
                    text: "You haven't selected anything",
                    type: "warning",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }

        });
        /*****************Checking out visitors end*********************/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/visitors.blade.php ENDPATH**/ ?>