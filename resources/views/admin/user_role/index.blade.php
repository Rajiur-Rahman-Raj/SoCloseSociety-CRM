@extends('layouts.app_backend')

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

@section('content')
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE ROLE=====-->
    <div class="modal fade" id="createRole" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user_role.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="role" class="col-form-label">Role<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="role" id="role" value="{{ old('role') }}">
                            @error('role')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
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
                                        @php
                                            $all_navigations = App\Models\Navigation::all();
                                        @endphp

                                        @foreach ($all_navigations as $item)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input inner-checkbox" name="permission[]" value="{{ $item->id }}" type="checkbox" id="flexSwitchCheckDefault{{ $item->id }}">
                                            <label class="form-check-label" for="flexSwitchCheckDefault{{ $item->id }}"> {{ $item->name }} [ {!! $item->icon !!} ]</label>
                                        </div>
                                        @endforeach

                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer border-top-0">
                            <button style="background-color: #6C7BFF; color: #ffffff;" type="submit"
                                class="btn w-100">Create
                                Role</button>
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
                @foreach ($roles as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{$item->role}}</td>
                    <td>
                        @php
                            $permission = json_decode($item->permission);
                        @endphp
                        @foreach ($permission as $data)
                            {{ App\Models\Navigation::find($data)->name }},
                        @endforeach
                    </td>
                    <td>{{ $item->created_at->format('d-M-Y') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> Edit</a></li>

                                @if ($item->id != 1)
                                <li><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"><i class="fa-solid fa-trash" class="mr-50"></i> Delete</a></li>
                                @endif

                            </ul>
                        </div>
                    </td>
                </tr>

                <!-- Modal Delete Role -->
                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"      aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Are You Sure?</h6>
                                <p class="text-danger">All the data will be deleted related with Role</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <form action="{{ route('user_role.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete
                                    </form>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!--=====MODAL FOR EDIT ROLE=====-->
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Edit Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user_role.update',$item->id) }}">
                                    @csrf
                                    @method("PUT")
                                    <div class="mb-3">
                                        <label for="role" class="col-form-label">Role<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="role" id="role" value="{{ $item->role }}">
                                        @error('role')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    @php
                                        $selected_permission = json_decode($item->permission);
                                    @endphp
                                    <div>
                                        @include('includes.user_update_role')
                                    </div>

                                    <div class="modal-footer border-top-0">
                                        <button style="background-color: #6C7BFF; color: #ffffff;" type="submit"
                                            class="btn w-100">Update Role</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
@endsection

@section('js')
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
@endsection
