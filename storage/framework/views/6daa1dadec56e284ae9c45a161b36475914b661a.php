

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE USER=====-->
    <div class="modal fade" id="createStatus" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('status.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" id="recipient-name" value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ["name"];
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
                                Status</button>
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

                <span>
                    <button class="btn tickets_header_btn ms-3">Done</button>
                </span>
            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createStatus" data-bs-whatever="@mdo">
                <a>
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    Create Status</a>
            </button>

        </div>
    </div>
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover table-overflow-none" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td>
                        <?php echo e($status->name); ?>

                    </td>
                    <td><?php echo e($status->created_at->format('d-m-Y')); ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href=""> <i class="fa-solid fa-edit"> </i> Edit</a></li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteStatus<?php echo e($status->id); ?>" style="cursor:pointer"> <i class="fa-solid fa-trash"> </i> Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="deleteStatus<?php echo e($status->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Delete Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Are You Sure?</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="<?php echo e(route('status.destroy', $status->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                        </div>
                    </div>
               </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\CRM\SoCloseSociety-CRM\resources\views/admin/status/index.blade.php ENDPATH**/ ?>