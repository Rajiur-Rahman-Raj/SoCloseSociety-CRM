@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE Role=====-->
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
            {{-- <button data-bs-toggle="modal" data-bs-target="#createModal" data-bs-whatever="@mdo">
                Access and Permission
            </button> --}}
        </div>
    </div>
    <!--==========User Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none" style="overflow: unset">
        <table class="table table-hover" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->role}}</td>
                    <td>{{ $item->created_at->format('d-M-Y') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="fa-solid fa-trash" class="mr-50"></i> Delete</a></li>
                            </ul>
                        </div>

                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <h6>Are You Sure?</h6>
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

                @endforeach
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
@endsection
