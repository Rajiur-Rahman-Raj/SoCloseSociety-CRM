

<?php $__env->startSection('content'); ?>
 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card" style="margin-top:35px">
                    <h5 class="card-header">Set Priority</h5>
                    <div class="card-body">
                        <form action="<?php echo e(route('priority.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter priority">
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

                            <div class="form-group mt-2">
                              <label for="exampleInputPassword1">Value <span class="text-danger">*</span></label>
                              <input type="text" name="value" class="form-control" id="exampleInputPassword1" placeholder="enter priority value">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                          </form>
                    </div>
                  </div>
            </div>

            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rajiur Rahman\Desktop\Alhamdulillah\crm\resources\views/admin/priority/create.blade.php ENDPATH**/ ?>