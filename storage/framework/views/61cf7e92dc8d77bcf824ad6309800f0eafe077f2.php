    <?php
        $loged_in_user_permission = json_decode(Auth::user()->permission);
    ?>

    <?php $__currentLoopData = $loged_in_user_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php if($item == 5): ?>
        <a href="<?php echo e(route('status.index')); ?>"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>Status</a>
    <?php endif; ?>

    <?php if($item == 6): ?>
        <a href="<?php echo e(route('department.index')); ?>"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>Department</a>
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Rajiur Rahman\Desktop\crm2\SoCloseSociety-CRM\resources\views/layouts/tareq_sidebar.blade.php ENDPATH**/ ?>