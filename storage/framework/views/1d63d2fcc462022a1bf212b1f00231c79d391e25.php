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


<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="    background: #6c7bff;color: white;font-size: 18px;">
            <span style="    color: #080808;font-size: 20px;margin-right: 10px;margin-top: -2px;"><i class="fa-solid fa-lock"></i> </span>  Permission
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
                <div class="form-check form-switch select_all_checkbox">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="checkAll(this)">
                    <label class="form-check-label" for="flexSwitchCheckDefault"> Select All </label>

                </div>

                <?php
                    $all_navigations = App\Models\Navigation::all();
                ?>

                <?php $__currentLoopData = $all_navigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check form-switch">
                        <input class="form-check-input inner-checkbox" <?php echo e(in_array($item->id, $selected_permission)? 'checked' : ''); ?> name="permission[]" value="<?php echo e($item->id); ?>" type="checkbox" id="flexSwitchCheckDefault<?php echo e($item->id); ?>">
                        <label class="form-check-label" for="flexSwitchCheckDefault<?php echo e($item->id); ?>"> <?php echo e($item->name); ?> [ <?php echo $item->icon; ?> ]</label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>






<?php /**PATH C:\Users\HP\Desktop\SoCloseSociety-CRM\resources\views/includes/user_update_role.blade.php ENDPATH**/ ?>