@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE USER=====-->
    <div class="modal fade" id="createDepartment" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error("name")
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role_id" class="col-form-label">Select Role (Agent*)</label>
                            <select name="role_id" id="role_dropdown" class="form-select mt-1" style="width: 100%">
                                <option selected disabled>Select Agent</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                            @error("name")
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label for="user_id" class="mt-3 col-form-label">Agent Name</label>
                        <select name="user_id[]" id="user_dropdown" class="form-select mt-1" aria-label="Default select example" multiple="multiple" style="width: 100%">
                            @php
                                $show_users = [];
                            @endphp
                            @include('includes.user_dropdown')
                        </select>
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

                <span>
                    <button class="btn tickets_header_btn ms-3">Done</button>
                </span>
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
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover table-overflow-none" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{ $department->name }}
                    </td>
                    <td>{{ $department->created_at->format('d-m-Y') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('department.show', $department->id) }}" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> Show </a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateDepartment{{ $department->id }}" style="cursor:pointer"> <i class="fa-solid fa-edit"> </i> Edit</a></li>
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteDepartment{{ $department->id }}" style="cursor:pointer"> <i class="fa-solid fa-trash"> </i> Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="deleteDepartment{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Delete Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>Are You Sure?</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="{{ route('department.destroy', $department->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                        </div>
                    </div>
               </div>
                <!--=====MODAL FOR UPDATE USER=====-->
                <div class="modal fade" id="updateDepartment{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Update Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('department.update', $department->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group mt-2">
                                        <label class="form-label">Name <span class="text-danger"> *</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $department->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="role_id" class="col-form-label"> Role (Agent*)</label>
                                        <select name="role_id" id="role_drop{{ $department->id }}" class="form-select mt-1">
                                            <option selected disabled>Select Agent</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id}}" {{ $role->id == $department->role_id ? 'selected' : '' }}>{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                        @error("role_id")
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="user_id" class="mt-3 col-form-label">Agent Name</label>
                                        <select name="user_id[]" multiple id="user_drop{{ $department->id }}" class="form-select mt-1" aria-label="Default select example">
                                            @php
                                                $show_users = [];
                                            @endphp
                                            @include('includes.user_drop')
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#role_dropdown').select2();
        $('#user_dropdown').select2({theme: "classic"});
        $('#role_dropdown').change(function() {

            var role_id = $(this).val();
            // alert(role_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('get.users') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_dropdown').html(data.data)
                    // console.log(data);
                }
            })
        });
    });
</script>

@foreach ($departments as $department)
<script>
    $(document).ready(function() {
        $('#role_drop{{ $department->id }}').change(function() {

            var role_id = $(this).val();
            // alert(role_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('edit.department') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_drop{{ $department->id }}').html(data.data)
                    // console.log(data);
                }
            })
        });
    });
</script>
@endforeach

@endsection
