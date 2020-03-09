<?php $__env->startSection('title', 'Settings Page'); ?>

<?php $__env->startSection('vendor-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/tables/datatable/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/calendars/fullcalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/calendars/extensions/daygrid.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/calendars/extensions/timegrid.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/pickers/pickadate/pickadate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mystyle'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/data-list-view.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/calendars/fullcalendar.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <form action="javascript:void(0)" name="configForm">
            <section class="mb-4">
                <p>Change Theme</p>
                <div class="d-flex pl-2">

                    <div>
                        <img src="<?php echo e(asset("img/brand/color_box.png")); ?>" class="bg-white rounded-left">
                        <input type="radio" name="theme" value="light" class="configTheme"
                               <?php if($user->config->theme=="light"): ?>checked <?php endif; ?>>
                        <span>Light Theme</span>
                    </div>
                    <div class="pl-2">
                        <img src="<?php echo e(asset("img/brand/color_box.png")); ?>" class="rounded-left"
                             style="background-color: darkgrey!important;">
                        <input type="radio" name="theme" value="semi-dark-layout" class="configTheme"
                               <?php if($user->config->theme=='semi-dark-layout'): ?>checked <?php endif; ?>>
                        <span>Semi-Dark</span>
                    </div>
                    <div class="pl-2">
                        <img src="<?php echo e(asset("img/brand/color_box.png")); ?>" class="bg-dark rounded-left">
                        <input type="radio" name="theme" value="dark-layout" class="configTheme"
                               <?php if($user->config->theme=='dark-layout'): ?>checked <?php endif; ?>>
                        <span>dark Theme</span>
                    </div>
                </div>
            </section>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-allAdmins',$user)): ?>
                <section class="mb-4">
                    <p>SMS Notification Settings</p>
                    <div class="pl-2 mb-3">

                        <div class="row mb-3">
                            <div class="col-md-3 pt-1">
                                <span>Default Auto Notification</span>
                            </div>
                            <div class="col-md-4 pt-1">
                                <div class="d-flex">
                                    <div>
                                        <label>
                                            <input type="radio" class="OrgConSilentUpdate" name="defaultNote" value="email"

                                            <?php if($organisation->organisation_config->defaultNote=="email"): ?> checked <?php endif; ?> >
                                        </label> Email
                                    </div>
                                    <div class="pl-4">
                                        <label>
                                            <input type="radio" class="OrgConSilentUpdate" name="defaultNote" value="sms"
                                            <?php if($organisation->organisation_config->defaultNote=="sms"): ?> checked <?php endif; ?> >
                                        </label> SMS
                                    </div>
                                    <div class="pl-4">
                                        <label>
                                            <input type="radio" class="OrgConSilentUpdate" name="defaultNote" value="both"
                                            <?php if($organisation->organisation_config->defaultNote=="both"): ?> checked <?php endif; ?> >
                                        </label> Both
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-md-3 pt-1">
                                <span>Appointment Notification</span>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <input type="range" max="10" min="1" value="2"
                                           class="form-control form-control-alternative configSilentUpdate"
                                           <?php if($role->id>2): ?> disabled <?php endif; ?>>
                                </div>
                                <span class="small" id="daysIndicator">2 days before</span>
                            </div>

                        </div>
                    </div>
                    <div class="pl-2 mb-3">

                        <div class="row">
                            <div class="col-md-3 pt-1">
                                <span>Time to send</span>
                            </div>
                            <div class="col-md-4">
                                <input type="time"
                                       class="configSxMS form-control form-control-alternative" value="08:08"
                                       <?php if($role->id>2): ?> disabled <?php endif; ?>>
                            </div>

                        </div>
                    </div>

                    <div class="pl-2 mb-3">

                        <div class="row">
                            <div class="col-md-3 pt-1">
                                <span>Default Message</span>
                            </div>
                            <div class="col-md-4">
                           <textarea data-length=100 class="form-control char-textarea OrgConSilentUpdate"
                                     id="textarea-counter"
                                     rows="2" placeholder="Default appointment message" name="notify_message"
                                     <?php if($role->id>2): ?> disabled <?php endif; ?>><?php echo e($organisation->organisation_config->notify_message); ?></textarea>
                                <small class="counter-value float-right"><span class="char-count">0</span> / 100</small>
                            </div>

                        </div>
                    </div>

                    <div class="pl-2 mb-3">
                        <div class="row">
                            <div class="col-md-2  pt-1">
                                <span>Server Settings</span>
                            </div>
                            <div class="col-md-2">
                                <label class="text-light">Partner ID</label>
                                <input name='partner_id' type="number"
                                       class="form-control form-control-alternative OrgConSilentUpdate"
                                       value="<?php echo e($organisation->organisation_config->partner_id); ?>"
                                       <?php if($role->id!=1): ?> disabled <?php endif; ?>>
                            </div>
                            <div class="col-md-2">
                                <label class="text-light">Api Key</label>
                                <input name="api_key" type="text"
                                       class="form-control form-control-alternative OrgConSilentUpdate"
                                       value="<?php echo e($organisation->organisation_config->api_key); ?>"
                                       <?php if($role->id!=1): ?> disabled <?php endif; ?>>
                            </div>
                            <div class="col-md-2">
                                <label class="text-light">Short Code</label>
                                <input name="short_code" type="text"
                                       class="text-uppercase form-control form-control-alternative OrgConSilentUpdate"
                                       value="<?php echo e($organisation->organisation_config->short_code); ?>"
                                       <?php if($role->id>2): ?> disabled <?php endif; ?>>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-allAdmins',$user)): ?>
                <section class="mb-4">
                    <p>Email Configuration Settings</p>

                    <div class="pl-2 mb-3">
                        <div class="row">
                            <div class="col-md-2  pt-1">
                                <span>Server Settings</span>
                            </div>
                            <div class="col-md-2">
                                <label class="text-light">Email Address</label>
                                <input name='note_email' type="email"
                                       class="form-control form-control-alternative OrgConSilentUpdate"
                                       value="<?php echo e($organisation->organisation_config->note_email??$organisation->email); ?>"
                                       <?php if($role->id>2): ?> disabled <?php endif; ?>>
                            </div>
                            <div class="col-md-2">
                                <label class="text-light">Phone</label>
                                <input name="note_phone" type="tel"
                                       class="form-control form-control-alternative OrgConSilentUpdate"
                                       value="<?php echo e($organisation->organisation_config->note_phone??$organisation->phone); ?>"
                                       <?php if($role->id>2): ?> disabled <?php endif; ?>>
                            </div>
                            <div class="col-md-2">
                                <label class="text-light">Email CC</label>
                                <input name="note_email_cc" type="tel"
                                       class="form-control form-control-alternative OrgConSilentUpdate"
                                       value="<?php echo e($organisation->organisation_config->note_phone); ?>"
                                       <?php if($role->id>2): ?> disabled <?php endif; ?>>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-allAdmins',$user)): ?>

                <section class="mb-4">
                    <p>Organisation Settings</p>
                    <div class="pl-2 mb-3">

                        <div class="row ">
                            <div class="col-md-3 pt-1">
                                <span>Add Department</span>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control border"
                                           placeholder="Office/department name"
                                            name="departments" aria-describedby="button-addon2">

                                    <div class="input-group-append" id="button-addon2">
                                        <button class="btn btn-secondary waves-effect waves-light"
                                                type="button" id="officeAdd">Add <i
                                                    class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="text-md-center">
                                    <span class="text-muted small">Multiple to be separated by a comma(,)</span>
                                </div>
                                <br>
                                <ul class="list-group" id="offices">
                                    <?php $__currentLoopData = explode(",",rtrim($organisation->organisation_config->departments,",")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($depts==""): ?>
                                            <?php continue; ?>;
                                        <?php endif; ?>

                                        <li class="w-75 list-group-item d-flex justify-content-between align-items-center">
                                            <span><?php echo e($depts); ?></span>
                                            <a href="javascript:removeOffice('<?php echo e($depts); ?>')" class=""><i
                                                        class="feather icon-x"></i> </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>


                            </div>

                        </div>

                        <div class="row mt-2">

                            <div class="col-md-3 pt-1">
                                <span>Add Expected Assets</span>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control border"
                                           placeholder="Asset name"
                                            name="assets" aria-describedby="button-addon2">

                                    <div class="input-group-append" id="button-addon2">
                                        <button class="btn btn-secondary waves-effect waves-light"
                                                type="button" id="assetAdd">Add <i
                                                    class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="text-md-center">
                                    <span class="text-muted small">Multiple to be separated by a comma(,)</span>
                                </div>
                                <br>
                                <ul class="list-group" id="assets">
                                    <?php $__currentLoopData = explode(",",rtrim($organisation->organisation_config->assets,",")); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($assets==""): ?>
                                            <?php continue; ?>;
                                        <?php endif; ?>

                                        <li class="list-group-item d-flex justify-content-between align-items-center w-75">
                                            <span><?php echo e($assets); ?></span>
                                            <a href="javascript:removeAsset('<?php echo e($assets); ?>')" class=""><i
                                                        class="feather icon-x"></i> </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>


                            </div>

                        </div>
                    </div>
                </section>
            <?php endif; ?>

        </form>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('for-superAdmin',$user)): ?>
            <div class="mt-3">
                <p>View Audit Trails</p>
                <div class="d-flex pl-2">

                    <div>
                        <a href="<?php echo e(route('telescope')); ?>">View all audits</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>


    <!-- Column selectors with Export Options and print table -->

    <!-- Column selectors with Export Options and print table -->

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

    <script src="<?php echo e(asset('vendors/js/extensions/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/extensions/daygrid.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/extensions/timegrid.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/calendar/extensions/interactions.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.date.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
    
    <script src="<?php echo e(asset('js/scripts/datatables/datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts/ui/data-list-view.js')); ?>"></script>

    <script src="<?php echo e(asset('js/scripts/extensions/fullcalendar.js')); ?>"></script>
    <script>
        var form = document.forms['configForm'];
        $('.configTheme').change(function () {
            $.get("config/update" + "?" + this.name + "=" + this.value, function (data, status) {
                if (data) {
                    window.location.assign('Settings');
                }
            });
        });
        $('.configSilentUpdate').change(function () {
            if (this.type === "range")
                document.getElementById("daysIndicator").innerHTML = this.value + " days before";
            $.get("config/update" + "?" + this.name + "=" + this.value, function (data, status) {
                if (data) {
                }
            });
        });

        $('.OrgConSilentUpdate').change(function () {
            $.get("org_config/update" + "?" + this.name + "=" + this.value, function (data, status) {
                if (data) {
                }
            });
        });


        $("#officeAdd").click(function () {
            if (form["departments"].value === "")
                return;

            var dept = form["departments"].value;
            var xlist = '                                <li class="w-75 list-group-item d-flex justify-content-between align-items-center">\n' +
                '                                    <span>' + dept + '</span>\n' +
                '                                    <a href="javascript:removeOffice(\'' + dept + '\')" class=""><i class="feather icon-x"></i> </a>\n' +
                '                                </li>';
            $("#offices").prepend(xlist);


            $.get("org_config/update" + "?" + form["departments"].name + "=" + dept, function (data, status) {
                if (data) {
                    form["departments"].value = "";
                }
            });


        });

        function removeOffice(dept) {
            $.get("org_config/delete" + "?departments" + "=" + dept, function (data, status) {
                if (data) {
                    window.location.assign(data);
                }
            });
        }









        $("#assetAdd").click(function () {
            if (form["assets"].value === "")
                return;

            var asset = form["assets"].value;
            var xlist = '                                <li class="list-group-item w-75 d-flex justify-content-between align-items-center">\n' +
                '                                    <span>' + asset + '</span>\n' +
                '                                    <a href="javascript:removeAsset(\'' + asset + '\')" class=""><i class="feather icon-x"></i> </a>\n' +
                '                                </li>';
            $("#assets").prepend(xlist);


            $.get("org_config/update" + "?" + form["assets"].name + "=" + asset, function (data, status) {
                if (data) {
                    form["assets"].value = "";
                }
            });


        });

        function removeAsset(asset) {
            $.get("org_config/delete" + "?assets" + "=" + asset, function (data, status) {
                if (data) {
                    window.location.assign(data);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/portal/settings.blade.php ENDPATH**/ ?>