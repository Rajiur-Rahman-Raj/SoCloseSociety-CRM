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
    // function checkAll(myCheckbox){

    //     var checkboxes = document.querySelectorAll("input[type = 'checkbox']");

    //     if(myCheckbox.checkbox = true){
    //         checkboxes.forEach(function(checkbox){
    //             checkbox.checked = true;
    //         });
    //     }
    //     else{
    //         checkboxes.forEach(function(checkbox){
    //             checkbox.checked = false;
    //         });
    //     }

    // }

    // second checking
    
    // function uncheckAll(myCheckbox){

    //     var checkboxes = document.querySelectorAll("input[type = 'checkbox']");

    //     if(myCheckbox.checkbox2 = true){
    //         checkboxes.forEach(function(checkbox){
    //             checkbox.checked = false;
    //         });
    //     }
    //     else{
    //         checkboxes.forEach(function(checkbox){
    //             checkbox.checked = true;
    //         });
    //     }
    // }
</script>


<?php if($role_id == 1): ?>
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
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault1" onchange="checkAll(this)">
                    <label class="form-check-label" for="flexSwitchCheckDefault1">Select All</label>
                </div>
                
                <div class="form-check form-switch select_all_checkbox">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2" onclick="uncheckAll(this)">
                    <label class="form-check-label" for="flexSwitchCheckDefault2">deSelect All</label>
                </div> 

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault3">
                    <label class="form-check-label" for="flexSwitchCheckDefault3">Default switch checkbox input</label>
                </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if($role_id == 2): ?>
    <p>agent area</p>
<?php endif; ?>

<?php if($role_id == 3): ?>
    <p>customer area</p>
<?php endif; ?>


<?php /**PATH C:\Users\Rajiur Rahman\Desktop\Alhamdulillah\crm\resources\views/includes/role_permission.blade.php ENDPATH**/ ?>