<?php echo $__env->make('layouts.dashboard_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="d-flex" id="wrapper">
        
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php echo $__env->make('layouts.dashboard_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rajiur Rahman\Desktop\crm2\SoCloseSociety-CRM\resources\views/layouts/app_backend.blade.php ENDPATH**/ ?>