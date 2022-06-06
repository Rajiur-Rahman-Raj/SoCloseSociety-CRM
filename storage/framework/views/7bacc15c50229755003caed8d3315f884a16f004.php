    
    
    <?php
        $loged_in_user_permission = json_decode(Auth::user()->permission);
    ?>

    <?php $__currentLoopData = $loged_in_user_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        


        <?php if($item == 2): ?>
            <a href="<?php echo e(route('users.index')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Users</a>
        <?php endif; ?>


        <?php if($item == 4): ?>
            <a href="<?php echo e(route('priority.index')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-user me-2"></i>Priorities</a>
        <?php endif; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

    
    <?php /**PATH C:\Users\Rajiur Rahman\Desktop\crm2\SoCloseSociety-CRM\resources\views/layouts/raju_sidebar.blade.php ENDPATH**/ ?>