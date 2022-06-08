<?php $__env->startSection('content'); ?>

<section class="banner-main-section py-5 all-pages-input" id="main">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Department </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th> Name</th>
                                                        <td><?php echo e(ucwords($department->name)); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Role</th>
                                                        <td><?php echo e($department->get_role->role); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            Agents
                                                        </th>
                                                        <td>
                                                            <?php
                                                                $dept = json_decode($department->user_id);
                                                            ?>
                                                            <?php $__currentLoopData = $dept; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e(ucwords(App\Models\User::find($item)->name)); ?> ,
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="<?php echo e(route('department.index')); ?>">Return Back</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\SoCloseSociety-CRM\resources\views/admin/department/show.blade.php ENDPATH**/ ?>