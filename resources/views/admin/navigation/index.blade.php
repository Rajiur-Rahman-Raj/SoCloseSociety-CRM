@extends('layouts.app_backend')

@section('content')

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE User=====-->
    <div class="modal fade" id="createNavigation" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Navigation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('navigation.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="value" class="col-form-label">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon" value="{{ old('icon') }}">
                            @error('icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="value" class="col-form-label">Route</label>
                            <input type="text" name="route" class="form-control" id="route" value="{{ old('route') }}">
                            @error('route')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="value" class="col-form-label">Select Role</label>
                            <select name="role_id" id="role_id_for_create_user"  class="form-control">
                                <option value="">--Select One--</option>
                                @foreach ($user_role_data as $item)
                                <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

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

    <!--==========Navigation Header==========-->
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
            <button data-bs-toggle="modal" data-bs-target="#createNavigation" data-bs-whatever="@mdo">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                Create Navigation
            </button>
           
        </div>
    </div>
    <!--==========Navigation Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Name</th>
                    <th scope="col">Route</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_navigation_data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {!! $item->icon !!}
                    </td>

                    <td>{{ $item->name  }}</td>
                    <td>{{ $item->route }}</td>
                    <td>{{ $item->created_at->Format('Y-m-d') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateNavigation{{ $item->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> Edit</a></li>
                                <li>
                                    
                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteNavigation{{ $item->id }}" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> Delete </a>
                                </li>
                              
                            </ul>
                            
                        </div>
                    </td>
                    
                </tr>

            
                {{-- delete modal --}}

                <div class="modal fade" id="deleteNavigation{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="{{ route('navigation.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
               </div>

               <!--=====MODAL FOR UPDATE USER=====-->
               <div class="modal fade" id="updateNavigation{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('navigation.update', $item->id) }}" method="POST">
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
                                    <label class="form-label">Icon <span class="text-danger"> *</span></label>
                                    <input type="text" name="icon" class="form-control" value="{{ $item->icon }}">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-2">
                                    <label class="form-label">Route <span class="text-danger"> *</span></label>
                                    <input type="text" name="route" class="form-control" value="{{ $item->route }}">
                                    @error('route')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3">
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
                                </div> --}}

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
