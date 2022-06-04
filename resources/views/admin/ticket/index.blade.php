@extends('layouts.app_backend')

@section('content')
<div class="container-fluid px-4">
    <!--==========Team Header==========-->
    <div class="current_ticket mt-3 d-flex justify-content-between flex-wrap">
        <div class="current_ticket__left">
            <div class="current_ticket__left__btn">
                <button class="btn item active">Current Ticket</button>
                <button class="btn item">Open Ticket</button>
                <button class="btn item">Closed Ticket</button>
                <button class="btn item">Solved Ticket</button>
                <button class="btn item">All</button>
            </div>
        </div>

        <div class="current_ticket__right">
            <div class="current_ticket__right__btn d-flex">
                <div class="current_ticket__right__btn__div me-2">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#createTicket" data-bs-whatever="@mdo">
                        <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                        Create Ticket
                    </button>
                </div>

                <!--=====Create Tickets=====-->
                <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">Create Ticket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ticket.store') }}" method="post">
                                @csrf
                                <div class="offcanvas-body">
                                    <label for="#">Roles</label>
                                    <select name="role" id="role_dropdown" class="form-select mt-1">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->role }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Customers</label>
                                    {{-- <input type="text" name="customer_name" class="form-select mt-1> --}}
                                    <select name="customer_name" id="user_dropdown" class="form-select mt-1" aria-label="Default select example">
                                        @php
                                            $show_users = [];
                                        @endphp
                                        @include('includes.user_dropdown')
                                    </select>

                                    <label class="mt-3" for="#">Subject</label>
                                    <input type="text" name="subject" class="form-control mt-2">

                                    <label class="mt-3" for="#">Department</label>
                                    <select name="department" class="form-select mt-1" aria-label="Default select example">
                                        <option selected disabled>Select Department</option>
                                        @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    </select>

                                    <label class="mt-3" for="#">Status</label>
                                    <select name="status" class="form-select mt-1" aria-label="Default select example">
                                        <option selected disabled>Select Ticket Status</option>
                                        @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Priority</label>
                                    <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                        <option selected disabled>Select Ticket Priority</option>
                                        @foreach ($priority as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Ticket Body</label>
                                    <input type="hidden" name="ticket_body" id="ticket_body" class="form-control mt-2">
                                    <trix-editor input="ticket_body"></trix-editor>

                                    <button class="btn w-100 create_ticket_btn mt-3">Create Ticket</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
                {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Create Ticket</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <label for="#">Find Customer</label>
                        <input type="text" class="form-control mt-2">

                        <label class="mt-3" for="#">Subject</label>
                        <input type="text" class="form-control mt-2">

                        <label class="mt-3" for="#">Type</label>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected disabled>Select Type Of Ticket</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>

                        <label class="mt-3" for="#">Status</label>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected disabled>Select Ticket Status</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>

                        <label class="mt-3" for="#">Priority</label>
                        <select class="form-select mt-1" aria-label="Default select example">
                            <option selected disabled>Select Ticket Status</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>

                        <label class="mt-3" for="#">Asigne People</label>
                        <select class="js-example-basic-multiple form-select w-100 mt-1" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>

                        <label class="mt-3" for="#">Description</label>
                        <textarea style="resize: none;" class="form-control mt-1" placeholder="Write Here...." id="floatingTextarea"></textarea>

                        <label class="mt-3" for="#">Tag</label>
                        <input type="text" class="form-control" placeholder="Enter Ticket Tag">

                        <button class="btn w-100 create_ticket_btn mt-3">Create Ticket</button>
                    </div>
                </div> --}}
                <!--======End Create Tickets=====-->

                <div class="dropdown">
                    <button class="btn dropdown-toggle filter" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        filter
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-3 dropdown_list" aria-labelledby="dropdownMenuButton1">
                        <h5>Filters</h5>
                        <label class="mb-2" for="#">Customers</label>
                        <input type="text" name="" id="" placeholder="Lara" class="form-control">
                        <label class="mb-2 mt-2" for="#">Agents</label>
                        <input type="text" class="form-control" placeholder="Select Options">
                        <label class="mb-2 mt-2" for="#">Departments</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Labels</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Status</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Priorities</label>
                        <input type="text" class="form-control" placeholder="Select an Options">
                        <label class="mb-2 mt-2" for="#">Sort</label>
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <i class="fa-solid fa-arrow-up-short-wide"></i>
                                <span>Sort</span>
                            </button>
                            <input type="text" class="form-control" placeholder="Closed at" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div class="filter_btn d-flex justify-content-evenly">
                            <button class="btn">close</button>
                            <button class="btn">save</button>
                        </div>
                        <!-- <li><a class="dropdown-item" href="#">Action</a></li> -->
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">
            <h3>Current Tickets</h3>
        </div>
        <div class="current_tickets_heading__right">
            <div class="input-group mb-3">
                <button class="btn bg-white type=" button " id="button-addon1 ">
                    <i class="fa-solid fa-magnifying-glass "></i>
                </button>
                <input type="text " class="form-control border-0 " placeholder="Search Tickets.. "
                    aria-label="Example text with button addon " aria-describedby="button-addon1 ">
            </div>
        </div>
    </div>
    <!--==========Current Ticket Table===========-->
    <div class="current_tickets_table ">
        <div class="support_ticket ">
            <div class="col-lg-12 ">
                <div class="support ">
                    <!-- <div class="support_heading ">
                        <h3>All Support Tickets</h3>
                        <p>List of ticket open by customers</p>
                    </div> -->
                    <div class="support_table table-responsive ">
                        <table id="myTable " class="table table-hover b-t " class="display nowrap "
                            style="width:100% ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Request Name</th>
                                    <th>Department</th>
                                    <th>Subjects</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $item)
                                <tr id="tr1 ">
                                    <td>#{{ $item->id }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->department }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->priority }}</td>
                                    <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                    <td class="text-center ">
                                        {{-- <div class="dropdown ">
                                            <a class="btn bg-transparent dropdown-toggle " href="# "
                                                role="button " id="dropdownMenuLink "
                                                data-bs-toggle="dropdown " aria-expanded="false ">
                                                <i class="fa-solid fa-ellipsis-vertical "></i>
                                            </a>

                                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink ">
                                                <li><a class="dropdown-item mt-2 " href="# ">
                                                        <span><i class="fa-solid fa-eye me-2 "></i></span>
                                                        Details
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2 " data-bs-toggle="modal "
                                                        data-bs-target="#exampleModal "
                                                        data-bs-whatever="@mdo " href="# ">
                                                        <span><i
                                                                class="fa-solid fa-circle-check me-2 "></i></span>
                                                        Asignee
                                                    </a></li>
                                                <li><a class="dropdown-item mt-2 " href="# ">
                                                        <span><i
                                                                class="fa-solid fa-pen-to-square me-2 "></i></span>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item mt-2 " href="# ">
                                                        <span><i class="fa-solid fa-trash me-2 "></i></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> Edit</a></li>

                                                <li><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="fa-solid fa-trash" class="mr-50"></i> Delete</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('js')
<script>
    $(document).ready(function() {
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
@endsection
