

<?php $__env->startSection('priority.index'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE Priority=====-->
    <div class="modal fade" id="createPriority" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Priority</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('priority.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name')); ?>">
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
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save</button>
                </div>
                
            </div>
        </div>
    </div>
    <!--=====MODAL FOR CREATE Priority End =====-->

    <!--==========Priority Header==========-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
        <div class="team_header__left">
            <div class="input-group mb-3">
                <button class="btn bg-white" type="button" id="button-addon1"><i
                        class="fa-solid fa-magnifying-glass"></i></button>

                <input type="text" class="form-control border-0" placeholder="Search Here"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">

                <span>
                    <button class="btn tickets_header_btn ms-3">Done</button>
                </span>
            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createPriority" data-bs-whatever="@mdo">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                Create Priority
            </button>
           
        </div>
    </div>
    <!--==========Priority Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($all_priorities) > 0): ?>
                
                    <?php $__currentLoopData = $all_priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                        <td>
                            <?php echo e($item->name); ?>

                        </td>
                        <td><?php echo e($item->created_at->format('d-m-Y')); ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editPriority<?php echo e($item->id); ?>"><i class="fa-solid fa-edit" class="mr-50"></i> Edit</a></li>
                                    <li>
                                        
                                        <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deletePriority<?php echo e($item->id); ?>" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> Delete </a>
                                    </li>
                                </ul>
                                
                            </div>
                        </td>
                    </tr>

                    

                    <div class="modal fade" id="deletePriority<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 modal_header">
                                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Delete Priority</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Are You Sure?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <form action="<?php echo e(route('priority.destroy', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                </div>

                <div class="modal fade" id="editPriority<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 modal_header">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Edit Priority</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?php echo e(route('priority.update',$item->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("PUT"); ?>
                                    <div class="mb-3">
                                        <label for="role" class="col-form-label">Priority<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="priority" id="priority" value="<?php echo e($item->name); ?>">
                                        <?php $__errorArgs = ['priority'];
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

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button  type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                   <tr>
                        <td class="text-danger text-center p-3" colspan="1000"> No Role Available Here!</td>
                   </tr>
                <?php endif; ?>
                
                
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rajiur Rahman\Desktop\CRM-FINAL\SoCloseSociety-CRM\resources\views/admin/priority/index.blade.php ENDPATH**/ ?>