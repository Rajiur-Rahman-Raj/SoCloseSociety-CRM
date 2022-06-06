
    <?php
        $loged_in_user_permission = json_decode(Auth::user()->permission);
    ?>

    <?php $__currentLoopData = $loged_in_user_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($item == 0): ?>
        <a href="<?php echo e(route('dashboard')); ?>" class="list-group-item list-group-item-action bg-transparent second-text active"><i
        class="fa-solid fa-house me-2"></i>Dashboard <span class="badge ms-3">2</span></a>
    <?php endif; ?>
    
    <?php if($item == 3): ?>
        <a href="<?php echo e(route('ticket.index')); ?>"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>Tickets
        </a>
    <?php endif; ?>

    <?php if($item == 1): ?>
        <a href="<?php echo e(route('user_role.index')); ?>"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-gear me-2"></i>User Role
        </a>
    <?php endif; ?>
    

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Rajiur Rahman\Desktop\crm2\SoCloseSociety-CRM\resources\views/layouts/mahbub_sidebar.blade.php ENDPATH**/ ?>