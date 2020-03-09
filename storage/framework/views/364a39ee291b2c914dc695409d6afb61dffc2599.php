<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="">
                    <div class="brand-logo">
                        <img src="<?php echo e(asset(config('app.file_path').($organisation->image??'organisation/logo/org_default.svg'))); ?>"
                             class="w-100 rounded-circle" style="max-width: 36px;padding:2px" width="36px" height="36px">
                    </div>
                    <h2 class="brand-text mb-0 text-capitalize" style="padding-left: 4px">
                        <?php if(strlen($organisation->name)<10): ?>
                            <?php echo e($organisation->name); ?>

                        <?php else: ?>
                            <?php echo e(substr($organisation->name,0,10)); ?>..
                        <?php endif; ?>
                    </h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc" style="position: absolute;right: 16px;margin-top: 4px"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main pb-1" id="main-menu-navigation" data-menu="menu-navigation">
            
            <?php
                $menu='';
            ?>

            <?php $__currentLoopData = $menuData->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(isset($menu->navheader)): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($menu->policy, $user)): ?>
                        <li class="navigation-header">
                            <span class="text-blue"><?php echo e($menu->navheader); ?></span>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    
                    <?php
                        $custom_classes = "";
                        if(isset($menu->classlist)) {
                          $custom_classes = $menu->classlist;
                        }

                    ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($menu->policy, $user)): ?>
                        <li class="nav-item <?php echo e((request()->is('portal/'.$menu->url)) ? 'active' : ''); ?> <?php echo e($custom_classes); ?> ">
                            <a href="<?php if(isset($menu->uri)): ?><?php echo e(route($menu->uri)); ?><?php else: ?><?php echo e('javascript:void(0)'); ?><?php endif; ?>" id="<?php if(isset($menu->id)): ?><?php echo e($menu->id); ?><?php endif; ?>">
                                <i class="<?php echo e($menu->icon); ?>"></i>
                                <span class="menu-title"><?php echo e($menu->name); ?></span>
                                <?php if(isset($menu->badge)): ?>
                                    <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                                    <span class="<?php echo e(isset($menu->badgeClass) ? $menu->badgeClass.' test' : $badgeClasses.' notTest'); ?> "><?php echo e($menu->badge); ?></span>
                                <?php endif; ?>
                            </a>


                            <?php if(isset($menu->submenu)): ?>
                                <?php echo $__env->make('panels/submenu', ['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </ul>
        <div class="pt-1 text-center">
            <a href="javascript:void(0);" class="text-blue cs-text-shadow-white " style="font-size: 16px;opacity: .5">
                &copy; NeutronIT
            </a>
        </div>
        
    </div>
</div>
<!-- END: Main Menu--><?php /**PATH C:\Techxers\Neutron\resources\views/panels/sidebar.blade.php ENDPATH**/ ?>