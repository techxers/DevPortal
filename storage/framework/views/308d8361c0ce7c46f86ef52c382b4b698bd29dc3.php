
<ul class="menu-content">
    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php

        ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($submenu->policy, $user)): ?>
            <li class="<?php echo e((request()->is('portal/'.$submenu->url)) ? 'active' : ''); ?>">
                <a href="<?php if(isset($submenu->uri)): ?><?php echo e(route($submenu->uri)); ?><?php else: ?><?php echo e('javascript:void(0)'); ?><?php endif; ?>">
                    <i class="<?php echo e(isset($submenu->icon) ? $submenu->icon : ""); ?>"></i>
                    <span class="menu-title"><?php echo e($submenu->name); ?></span>
                </a>
                <?php if(isset($submenu->submenu)): ?>
                    <?php echo $__env->make('panels/submenu', ['menu' => $submenu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/panels/submenu.blade.php ENDPATH**/ ?>