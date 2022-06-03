<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card" style="margin-top:35px">
                    <h5 class="card-header">Update Status</h5>
                    <div class="card-body">
                        <form action="<?php echo e(route('status.update', $status->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="form-group mt-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e($status->name); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ck\Desktop\work\SoCloseSociety-CRM\resources\views/admin/status/edit.blade.php ENDPATH**/ ?>