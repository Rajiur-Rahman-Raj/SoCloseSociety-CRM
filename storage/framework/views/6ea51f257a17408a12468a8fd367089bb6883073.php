<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="card" style="margin-top:35px">
                <h5 class="card-header">Create Role</h5>
                <div class="card-body">
                    <form action="<?php echo e(route('user_role.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <label for="role">Role</label>
                          <input type="text" name="role" class="form-control" id="role" aria-describedby="emailHelp" placeholder="Enter Role">
                        </div>
                        <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($message); ?> *</span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </form>
                </div>
              </div>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\CRM\SoCloseSociety-CRM\resources\views/admin/user_role/create.blade.php ENDPATH**/ ?>