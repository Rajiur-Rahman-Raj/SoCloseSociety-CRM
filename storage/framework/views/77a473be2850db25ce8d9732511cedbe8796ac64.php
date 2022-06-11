

<?php $__env->startSection('css'); ?>
    <style>
        .form-check{
        margin-left: 70px !important;
    }
    .form-check-input{
        cursor: pointer;
        font-size: 18px;
    }
    .form-check-label{
        cursor: pointer;
    }
    .select_all_checkbox{
        margin-left: 45px !important;
        margin-bottom: 10px !important;
    }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE ROLE=====-->
    <!-- Vertically centered modal -->

    <div class="modal fade" id="createRole" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('user_role.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="role" class="col-form-label">Role<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="role" id="role" value="<?php echo e(old('role')); ?>">
                            <?php $__errorArgs = ['role'];
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

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background: #6c7bff;color: white;font-size: 18px;">
                                    <span style="    color: #080808;font-size: 20px;margin-right: 10px;margin-top: -2px;"><i class="fa-solid fa-lock"></i> </span>  Permission
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <div class="form-check form-switch select_all_checkbox">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="checkAll(this)">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Select All</label>
                                        </div>
                                        <?php
                                            $all_navigations = App\Models\Navigation::all();
                                        ?>

                                        <?php $__currentLoopData = $all_navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input inner-checkbox" name="permission[]" value="<?php echo e($item->id); ?>" type="checkbox" id="flexSwitchCheckDefault<?php echo e($item->id); ?>">
                                            <label class="form-check-label" for="flexSwitchCheckDefault<?php echo e($item->id); ?>"> <?php echo e($item->name); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button  type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!--==========Team Header==========-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3">
        <div class="team_header__left">
            <div class="input-group mb-3">
                <button class="btn bg-white" type="button" id="button-addon1"><i
                        class="fa-solid fa-magnifying-glass"></i></button>

                <input type="text" class="form-control border-0" placeholder="Search Here"
                    aria-label="Example text with button addon" aria-describedby="button-addon1">

            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createRole" data-bs-whatever="@mdo">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                Create Role
            </button>
        </div>
    </div>
    <!--==========User Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none" style="overflow: unset">
        <table class="table table-hover" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Role</th>
                    <th scope="col">Permissions</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($roles->count() > 0): ?>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->index + 1); ?></th>
                        <td>
                        <a href="<?php echo e(route('user_role.show', $item->id)); ?>" style="text-decoration: none"><?php echo e($item->role); ?></a>
                        </td>
                        <td>
                            <?php
                                $permission = json_decode($item->permission);
                            ?>
                            <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(App\Models\Navigation::find($data)->name ?? ''); ?>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($item->created_at->format('d-M-Y')); ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="mb-1"><a style="cursor: pointer" class="dropdown-item" href="<?php echo e(route('user_role.show', $item->id)); ?>"><i class="fa-solid fa-eye" class="mr-50"></i> Show</a></li>
                                    <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($item->id); ?>"><i class="fa-solid fa-edit" class="mr-50"></i> Edit</a></li>
                            
                                        <?php if($item->id == 1): ?>
                                            <?php else: ?>
                                            <li><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($item->id); ?>"><i class="fa-solid fa-trash" class="mr-50"></i> Delete</a></li>
                                        <?php endif; ?>

                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Delete Role -->
                    <div class="modal fade" id="deleteModal<?php echo e($item->id); ?>" tabindex="-1"      aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modal_header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Are You Sure?</h6>
                                    <p class="text-dark">( All the data will be deleted related with Role )</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <form action="<?php echo e(route('user_role.destroy', $item->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                            <button type="submit" class="btn btn-danger">Delete
                                        </form>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--=====MODAL FOR EDIT ROLE=====-->
                    <div class="modal fade" id="editModal<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 modal_header">
                                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Edit Role</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?php echo e(route('user_role.update',$item->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("PUT"); ?>
                                        <div class="mb-3">
                                            <label for="role" class="col-form-label">Role<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="role" id="role" value="<?php echo e($item->role); ?>">
                                            <?php $__errorArgs = ['role'];
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

                                        <?php
                                            $selected_permission = json_decode($item->permission);
                                        ?>
                                        <div>
                                            <?php echo $__env->make('includes.user_update_role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php $__env->startSection('js'); ?>
<script>
    function checkAll(myCheckbox){

    var checkboxes = document.querySelectorAll(".inner-checkbox");

    if(myCheckbox.checked){
        checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkboxes.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rajiur Rahman\Desktop\CRM-FINAL\SoCloseSociety-CRM\resources\views/admin/user_role/index.blade.php ENDPATH**/ ?>