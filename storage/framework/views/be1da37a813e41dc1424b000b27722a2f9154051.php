
<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center primary-text me-auto fw-bold text-uppercase">
        <a style="text-decoration: none;" href="index.html">LOGO</a>
    </div>
    <div class="list-group list-group-flush my-3">


        

        

        <?php echo $__env->make('layouts.mahbub_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.raju_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.tareq_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
            this.closest('form').submit();"><i
                class="fas fa-power-off me-2"></i>Logout</a>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->
<?php /**PATH C:\Users\Rajiur Rahman\Desktop\CRM-FINAL\SoCloseSociety-CRM\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>