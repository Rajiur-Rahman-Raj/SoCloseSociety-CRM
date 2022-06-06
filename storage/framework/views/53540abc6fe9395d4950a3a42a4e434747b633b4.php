    
    
    <?php
        $loged_in_user_role_id = Auth::user()->role_id;
        $user_role_id = App\Models\UserRole::find($loged_in_user_role_id)->id;
        $user_role_permission = App\Models\UserRole::find($loged_in_user_role_id)->permission;
    ?>

    

    
    <a href="<?php echo e(route('priority.index')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
        class="fa-solid fa-user me-2"></i>Priorities</a>
    <a href="<?php echo e(route('users.index')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
    class="fa-solid fa-user me-2"></i>Users</a><?php /**PATH C:\Users\Rajiur Rahman\Desktop\Alhamdulillah\crm\resources\views/layouts/raju_sidebar.blade.php ENDPATH**/ ?>