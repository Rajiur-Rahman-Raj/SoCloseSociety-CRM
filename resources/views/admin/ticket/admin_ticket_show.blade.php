@extends('layouts.app_backend')

@section('content')


<section class="banner-main-section py-5 all-pages-input" id="main">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Ticket Details </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                             Tickets Id
                                                        </th>
                                                        <td>
                                                           
                                                            #{{ $ticket->id }}
                                                        </td>
                                                    </tr>                                
                                                    <tr>
                                                        <th>
                                                             Name
                                                        </th>
                                                        <td>
                                                            @php
                                                                $customer_name = App\Models\User::find($ticket->customer);   
                                                            @endphp
                                                            {{ $customer_name->name }}
                                                        </td>
                                                    </tr>                                
                                                                                                            
                                                    <tr>
                                                        <th>
                                                            Department
                                                        </th>
                                                        <td>
                                                            {{ $ticket->get_department->name }}
                                                           
                                                        </td>
                                                    </tr> 

                                                    <tr>
                                                        <th>
                                                            Subject
                                                        </th>
                                                        <td>
                                                            {{ $ticket->subject }}
                                                           
                                                        </td>
                                                    </tr>  

                                                    <tr>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <td>
                                                            {{ $ticket->get_status->name ?? 'NULL' }}
                                                           
                                                        </td>
                                                    </tr>  

                                                    <tr>
                                                        <th>
                                                            Priority
                                                        </th>
                                                        <td>
                                                            {{ $ticket->get_priority->name ?? 'NULL' }}
                                                           
                                                        </td>
                                                    </tr> 

                                                    <tr>
                                                        <th>
                                                            Assignee
                                                        </th>
                                                        <td>
                                                            @if ($ticket->agent_id)
                                                                @foreach (json_decode($ticket->agent_id) as $agent_id)
                                                                    @php
                                                                        $agent_name = App\Models\User::find($agent_id)->name;
                                                                    @endphp
                                                                    
                                                                        {{ $agent_name ?? 'NULL'}},
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>    
                                                    <tr>
                                                        <th>
                                                            Ticket Body
                                                        </th>
                                                        <td>
                                                            {{ $ticket->ticket_body }}
                                                           
                                                        </td>
                                                    </tr>   
                                                                                                   
                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('ticket.index') }}">Return Back</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
