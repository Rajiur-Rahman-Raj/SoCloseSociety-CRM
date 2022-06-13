


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
                                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#edit_agent_customer_Ticket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                <span><i class="fa-solid fa-edit me-2"></i></span>
                                                Edit
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endif

            {{-- edit Agent cutomer ticket  --}}
            <div class="modal fade" id="edit_agent_customer_Ticket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 modal_header">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">Update Ticket</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('agent_ticket.update', $item->id) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="offcanvas-body">
    
                                        <label class="mt-3" for="#">Status</label>
                                        <select name="status" class="form-select mt-1" aria-label="Default select example">
                                            <option value="" disabled selected>--Select One--</option>
                                            @foreach ($status as $stat)
                                            <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                                            @endforeach
                                        </select>
      
                                        <button class="btn w-100 create_ticket_btn mt-3">Update Ticket</button>
                                    </div>
                                </form>
                            </div>
    
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif

            @endforeach



