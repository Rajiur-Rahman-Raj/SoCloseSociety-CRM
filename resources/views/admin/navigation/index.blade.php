@extends('layouts.app_backend')

@section('content')

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE User=====-->


    <!--=====MODAL FOR CREATE User End =====-->

    <!--==========Navigation Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover" id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Name</th>
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
                    <td>{{ $item->created_at->Format('Y-m-d') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateNavigation{{ $item->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> Edit</a></li>
                            </ul>

                        </div>
                    </td>
                </tr>

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
