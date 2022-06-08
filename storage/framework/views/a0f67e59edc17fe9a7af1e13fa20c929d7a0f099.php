<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE USER=====-->
    <div class="modal fade" id="createDepartment" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Set Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('agent.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="department_id" class="col-form-label">Agent Name <span class="text-danger">*</span> </label>
                            <select name="department_id" id="department_id" class="form-select mt-1">
                                <option selected disabled>Select Role</option>
                                <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ["department_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"> <?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="department_id" class="col-form-label">Department Name <span class="text-danger">*</span> </label>
                            <select name="department_id" id="department_id" class="form-select mt-1">
                                <option selected disabled>Select Role</option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ["department_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"> <?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="modal-footer border-top-0">
                            <button style="background-color: #6C7BFF; color: #ffffff;" type="submit"
                                class="btn w-100">Create
                                Department</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--==========Team Header==========-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
        <div class="team_header__left">
            <div class="input-group mb-3">
                <button class="btn bg-white" type="button" id="button-addon1"><i
                        class="fa-solid fa-magnifying-glass"></i></button>

                <input type="text" class="form-control border-0" placeholder="Search Here"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">

                
            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createDepartment" data-bs-whatever="@mdo">
                <a>
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    Create Department</a>
            </button>

        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\SoCloseSociety-CRM\resources\views/admin/agent/index.blade.php ENDPATH**/ ?>