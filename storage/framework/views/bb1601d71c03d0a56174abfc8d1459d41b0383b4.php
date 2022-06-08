

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE User=====-->
    <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('users.store')); ?>" method="POST" enctype="multipart/form-data">
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

                        <div class="mb-3">
                            <label for="name" class="col-form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
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
                        <div class="mb-3">
                            <label for="value" class="col-form-label">Email <span class="text-danger">*</span></label></label>
                            <input type="email" name="email" class="form-control" id="value" value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
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

                        <div class="mb-3">
                            <label for="value" class="col-form-label">Password <span class="text-danger">*</span></label></label>
                            <input type="password" name="password" class="form-control" id="password" value="<?php echo e(old('password')); ?>">
                            <?php $__errorArgs = ['password'];
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

                        <div class="mb-3">
                            <label for="value" class="col-form-label">Select Role <span class="text-danger">*</span></label></label>
                            <select name="role_id" id="role_id_for_create_user"  class="form-control">
                                <option value="">--Select One--</option>
                                <?php $__currentLoopData = $user_role_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->role); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['role_id'];
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

                        <div id="role_permission_area">
                            <?php
                                $role_id = '';
                            ?>
                            <?php echo $__env->make('includes.role_permission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        


                        <div class="modal-footer border-top-0">
                            <button style="background-color: #6C7BFF; color: #ffffff;" type="submit"
                                class="btn w-100">Submit</button>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!--=====MODAL FOR CREATE User End =====-->

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
            <button data-bs-toggle="modal" data-bs-target="#createUser" data-bs-whatever="@mdo">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                Create User
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
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $all_user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td>
                        <?php echo e($item->name); ?>

                    </td>
                    

                    <td><?php echo e($item->getRole->role); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e($item->created_at->Format('Y-m-d')); ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?php echo e(route('users.show', $item->id)); ?>" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> Show </a></li>
                                <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateUser<?php echo e($item->id); ?>' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> Edit</a></li>
                                <li>
                                    
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteUsers<?php echo e($item->id); ?>" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> Delete </a>
                                </li>
                              
                            </ul>
                            
                        </div>
                    </td>
                    
                </tr>

            
                

                <div class="modal fade" id="deleteUsers<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Delete Priority</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Are You Sure?</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="<?php echo e(route('users.destroy', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
               </div>

               <!--=====MODAL FOR UPDATE USER=====-->
               <div class="modal fade" id="updateUser<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route('users.update', $item->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="form-group mt-2">
                                <label class="form-label">Name <span class="text-danger"> *</span></label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($item->name); ?>">
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
                                <label class="form-label">Phone <span class="text-danger"> *</span></label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($item->name); ?>">
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
                                    <label class="form-label">Email <span class="text-danger"> *</span></label>
                                    <input type="email" name="email" class="form-control" value="<?php echo e($item->email); ?>">
                                    <?php $__errorArgs = ['email'];
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

                                <div class="mb-3">
                                    <label for="value" class="col-form-label">Role</label>
        
                                    <select name="role_id" id="role_id_for_update_user" class="form-control">
                                        <option value="">--Select One--</option>
                                        
                                        <?php $__currentLoopData = $user_role_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user_role_item->id); ?>" <?php echo e($user_role_item->id == $item->role_id ? 'selected' : ''); ?> ><?php echo e($user_role_item->role); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['role_id'];
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
                                <?php
                                    $all_data = json_decode($item->permission);
                                ?>
                                
                                <div id="role_permission_area">
                                    <?php echo $__env->make('includes.user_update_role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            $('#role_id_for_create_user').on('change', function(){
                
                var role_id_for_create_user = $(this).val();
                //ajax setup 
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('get_permission.users')); ?>",
                data: {
                    role_id: role_id_for_create_user
                },
                success: function(data) {
                    $('#role_permission_area').html(data.data)
                }
            })



            });
            
        })
        </script>


    <script>
        $(document).ready(function() {
            $('#role_id_for_update_user').on('change', function(){
                
                var role_id_for_create_user = $(this).val();
                //ajax setup 
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('get_permission.users')); ?>",
                data: {
                    role_id: role_id_for_create_user
                },
                success: function(data) {
                    $('#role_permission_area').html(data.data)
                }
            })



            });
            
        })
        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rajiur Rahman\Desktop\CRM-FINAL\SoCloseSociety-CRM\resources\views/admin/user/index.blade.php ENDPATH**/ ?>