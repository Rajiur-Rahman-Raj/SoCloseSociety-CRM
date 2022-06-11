


            {{-- for ticket replay condition divided customer ticket rep --}}
            @foreach ($tickets as $item)

            @php
                    $agent_id = json_decode($item->agent_id);
                    $loged_in_id = Auth::id();
                @endphp
                @if ($agent_id)
                    @foreach ($agent_id as $id)
                        @if($loged_in_id == $id)
                        <tr id="tr1 ">
                            <td>#{{ $item->id }}</td>
                            <td>
                                {{ $item->get_customer->name ?? ''}}
                            </td>
                            <td>{{ $item->get_department->name }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->get_status->name ?? ''}}</td>
                            <td>{{ $item->get_priority->name ?? '' }}</td>
                            <td>{{ $item->created_at->format('d-M-Y') }}</td>

                            <td>
                                @php
                                    $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
                                @endphp
                                <a href=" {{ route('ticket.reply', $item->id) }} "> <i class="fa-solid fa-reply-all" class="replay-icon-css"></i> <span> ( {{ count($all_replies) }} )</span> </a>
                            </td>
                            <td class="text-center ">
                                <div class="dropdown">

                                    <a class="btn bg-transparent dropdown-toggle" href="#"
                                        role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li class="m-2">
                                            <a style="cursor: pointer;"  href="{{ route('ticket.show', $item->id) }}">
                                                <span><i class="fa-solid fa-eye me-2"></i></span>
                                                Show
                                            </a>
                                        </li>
                                        <li class="m-2">

                                            @if($item->creator == 1)
                                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#editTicket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                <span><i class="fa-solid fa-edit me-2"></i></span>
                                                Edit
                                            </a>
                                            @else
                                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#edit_admin_customer_Ticket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                <span><i class="fa-solid fa-edit me-2"></i></span>
                                                Edit
                                            </a>
                                            @endif

                                        </li>
                                        <li class="m-2">
                                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteTicket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                <span><i class="fa-solid fa-trash me-2"></i></span>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @endif



            {{-- ######## Edit admin create ticket Data ####### --}}
            <div class="modal fade" id="editTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">Update Ticket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ticket.update', $item->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="offcanvas-body">
                                    <label for="#">Roles</label>
                                    <select name="role" id="role_drop" class="form-select mt-1">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $role->id == $item->id ? 'selected' : '' }}>{{ $role->role }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Customers</label>
                                    {{-- <input type="text" name="customer" class="form-select mt-1> --}}
                                    <select name="customer" id="user_drop" class="form-select mt-1" aria-label="Default select example">
                                        @php
                                            $show_users = [];
                                        @endphp
                                        @include('includes.user_dropdown')
                                    </select>

                                    <label class="mt-3" for="#">Subject</label>
                                    <input type="text" name="subject" class="form-control mt-2" value="{{ $item->subject }}">

                                    <label class="mt-3" for="#">Department</label>
                                    <select name="department" class="form-select mt-1" aria-label="Default select example">
                                        <option selected disabled>Select Department</option>
                                        @foreach ($department as $dept)
                                        <option value="{{ $dept->id }}" {{ $dept->id == $item->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                                        @endforeach
                                    </select>


                                    <label class="mt-3" for="#">Status</label>
                                    <select name="status" class="form-select mt-1" aria-label="Default select example">
                                        <option selected disabled>Select Ticket Status</option>
                                        @foreach ($status as $stat)
                                        <option value="{{ $stat->id }}" {{ $stat->id == $item->id ? 'selected' : '' }}>{{ $stat->name }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Priority</label>
                                    <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                        <option selected disabled>Select Ticket Priority</option>
                                        @foreach ($priority as $prio)
                                        <option value="{{ $prio->id }}" {{ $prio->id == $item->id ? 'selected' : '' }}>{{ $prio->name }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Ticket Body</label>
                                    <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4">{{ $item->ticket_body }}</textarea>

                                    <button class="btn w-100 create_ticket_btn mt-3">Update Ticket</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            {{-- edit admin cutomer ticket  --}}
            <div class="modal fade" id="edit_admin_customer_Ticket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">Update Ticket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ticket.update', $item->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="offcanvas-body">


                                    <label class="mt-3" for="#">Ticket Id</label>
                                    <input type="text" name="customer" class="form-control mt-1" value="{{ $item->id }}">

                                    <label class="mt-3" for="#">Subject</label>
                                    <input type="hidden" name="subject" class="form-control mt-1" value="{{ $item->subject }}">


                                    <label class="mt-3" for="#">Status</label>
                                    <select name="status" class="form-select mt-1" aria-label="Default select example">
                                        <option value="" disabled selected>--Select One--</option>
                                        @foreach ($status as $stat)
                                        <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" for="#">Priority</label>
                                    <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                        <option value="" disabled selected>--Select One--</option>
                                        @foreach ($priority as $prio)
                                        <option value="{{ $prio->id }}">{{ $prio->name }}</option>
                                        @endforeach
                                    </select>




                                    <label class="mt-3" for="#">Department</label>
                                    <select name="department" id="" class="form-control">
                                        @foreach ($department as $single_dept)

                                        @if( $item->get_department->id == $single_dept->id )
                                        <option value="{{ $item->get_department->id }}">{{ $single_dept->name }}</option>
                                        @endif

                                        @endforeach
                                    </select>

                                    {{-- <input type="text" name="department" class="form-control" value="{{ $item->get_department->id }}"> --}}

                                    <label class="mt-3" for="agent_id">Agent</label>

                                    <select name="agent_id[]" id="agent_dropdown{{ $item->id }}" class="form-select mt-1" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                        @php
                                            $all_agent = json_decode($item->get_department->user_id);
                                        @endphp

                                        @foreach ($all_agent as $agent)
                                        @php
                                            $agent_name = App\Models\User::find($agent)->name;
                                            $agent_id = App\Models\User::find($agent)->id;
                                            $agent_email = App\Models\User::find($agent)->email;
                                        @endphp

                                        <option value="{{ $agent_id }}">{{ ucwords($agent_name) }}</option>

                                        @endforeach
                                    </select>

                                        @foreach ($all_agent as $agent)
                                        @php
                                            $agent_email = App\Models\User::find($agent)->email;
                                        @endphp

                                        <input type="text" value="{{ $agent_email }}" name="agent_email[]">

                                        @endforeach

                                    <button class="btn w-100 create_ticket_btn mt-3">Update Ticket</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            {{-- ######## Delete Data ####### --}}
            <div class="modal fade" id="deleteTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="daleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="daleteModalLabel">Delete Ticket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Are You Sure?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="{{ route('ticket.destroy', $item->id) }}" method="POST">
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



