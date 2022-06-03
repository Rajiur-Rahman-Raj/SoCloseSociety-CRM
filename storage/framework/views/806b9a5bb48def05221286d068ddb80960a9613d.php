

<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center primary-text me-auto fw-bold text-uppercase">
        <a style="text-decoration: none;" href="index.html">LOGO</a>
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="<?php echo e(route('dashboard')); ?>" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fa-solid fa-house me-2"></i>Dashboard <span class="badge ms-3">2</span></a>
        
        <a href="<?php echo e(route('ticket')); ?>"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
            class="fa-solid fa-ticket me-2"></i>Tickets</a>
        

        <a href="<?php echo e(route('team')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fa-solid fa-users me-2"></i>Team</a>

        <a href="<?php echo e(route('user')); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fa-solid fa-user me-2"></i>User</a>
        <a href="<?php echo e(route('settings')); ?>"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fa-solid fa-gear me-2"></i>Settings</a>

        <?php echo $__env->make('layouts.raju_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('layouts.mahbub_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
            this.closest('form').submit();"><i
                class="fas fa-power-off me-2"></i>Logout</a>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper --><?php /**PATH C:\Users\ck\Desktop\work\SoCloseSociety-CRM\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>