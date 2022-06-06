@section('css')

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

@endsection

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

@if($role_id)
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

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="0" type="checkbox" id="flexSwitchCheckDefault2">
                    <label class="form-check-label" for="flexSwitchCheckDefault2">Dashboard</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="1" type="checkbox" id="flexSwitchCheckDefault2">
                    <label class="form-check-label" for="flexSwitchCheckDefault2">User Role</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="2" type="checkbox" id="flexSwitchCheckDefault3">
                    <label class="form-check-label" for="flexSwitchCheckDefault3">Users</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="3" type="checkbox" id="flexSwitchCheckDefault4">
                    <label class="form-check-label" for="flexSwitchCheckDefault4">Tickets</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="4" type="checkbox" id="flexSwitchCheckDefault5">
                    <label class="form-check-label" for="flexSwitchCheckDefault5">Priority</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="5" type="checkbox" id="flexSwitchCheckDefault6">
                    <label class="form-check-label" for="flexSwitchCheckDefault6">Status</label>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input inner-checkbox" name="permission[]" value="6" type="checkbox" id="flexSwitchCheckDefault7">
                    <label class="form-check-label" for="flexSwitchCheckDefault7">Department</label>
                </div>  
        </div>
      </div>
    </div>
  </div>
@endif





