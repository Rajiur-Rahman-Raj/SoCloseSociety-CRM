
    <?php

        // $all_navigations = App\Models\Navigation::all();
        $users_permission = json_decode(Auth::user()->permission);
        $role_id = Auth::user()->role_id;
    ?>

    <a href="<?php echo e(route('dashboard')); ?>" class="list-group-item list-group-item-action bg-transparent second-text active"><i
    class="fa-solid fa-house me-2"></i> Dashboard <span class="badge ms-3">2</span></a>

    <?php $__currentLoopData = $users_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $navigation_data = App\Models\Navigation::find($item);
        ?>
        <a href="<?php echo e(route($navigation_data->route.'.index')); ?>"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><?php echo $navigation_data->icon; ?> <?php echo e($navigation_data->name); ?>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($role_id == 1): ?>
        <a href="<?php echo e(route('navigation.index')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-user me-2"></i>Create Navigation</a>
    <?php endif; ?>
    


    

    
    <?php /**PATH C:\Users\Rajiur Rahman\Desktop\CRM-FINAL\SoCloseSociety-CRM\resources\views/layouts/raju_sidebar.blade.php ENDPATH**/ ?>