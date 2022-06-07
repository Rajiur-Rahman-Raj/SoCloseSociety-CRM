@extends('layouts.app_backend')

@section('content')

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
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="col-form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="value" class="col-form-label">Email <span class="text-danger">*</span></label></label>
                            <input type="email" name="email" class="form-control" id="value" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="value" class="col-form-label">Password <span class="text-danger">*</span></label></label>
                            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="value" class="col-form-label">Select Role <span class="text-danger">*</span></label></label>
                            <select name="role_id" id="role_id_for_create_user"  class="form-control">
                                <option value="">--Select One--</option>
                                @foreach ($user_role_data as $item)
                                <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div id="role_permission_area">
                            @php
                                $role_id = '';
                            @endphp
                            @include('includes.role_permission')
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
                @foreach ($all_user_data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{ $item->name }}
                    </td>
                    {{-- <td>
                        @php
                           $permission = json_decode($item->permission)
                        @endphp
                        @foreach ($permission as $per)
                            {{ $per }},
                        @endforeach
                    </td> --}}

                    <td>{{ $item->getRole->role  }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at->Format('Y-m-d') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('users.show', $item->id) }}" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> Show </a></li>
                                <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateUser{{ $item->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> Edit</a></li>
                                <li>
                                    
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteUsers{{ $item->id }}" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> Delete </a>
                                </li>
                              
                            </ul>
                            
                        </div>
                    </td>
                    
                </tr>

            
                {{-- delete modal --}}

                <div class="modal fade" id="deleteUsers{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
               </div>

               <!--=====MODAL FOR UPDATE USER=====-->
               <div class="modal fade" id="updateUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('users.update', $item->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group mt-2">
                                <label class="form-label">Name <span class="text-danger"> *</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="form-group mt-2">
                                    <label class="form-label">Email <span class="text-danger"> *</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ $item->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="value" class="col-form-label">Select Role</label>
        
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">--Select One--</option>
                                        
                                        @foreach ($user_role_data as $user_role_item)
                                        <option value="{{ $user_role_item->id }}" {{ $user_role_item->id == $item->role_id ? 'selected' : '' }} >{{ $user_role_item->role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
    <!-- other content -->
</div>

    
@endsection

@section('js')
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
                url: "{{ route('get_permission.users') }}",
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
        @endsection