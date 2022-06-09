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
                                                           
                                                            #{{ $single_ticket_details->id }}
                                                        </td>
                                                    </tr>                                
                                                    <tr>
                                                        <th>
                                                             Name
                                                        </th>
                                                        <td>
                                                            @php
                                                                $customer_name = App\Models\User::find($single_ticket_details->customer);   
                                                            @endphp
                                                            {{ $customer_name->name }}
                                                        </td>
                                                    </tr>                                
                                                                                                            
                                                    <tr>
                                                        <th>
                                                            Department
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->get_department->name }}
                                                           
                                                        </td>
                                                    </tr> 

                                                    <tr>
                                                        <th>
                                                            Subject
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->subject }}
                                                           
                                                        </td>
                                                    </tr>  

                                                    <tr>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->get_status->name ?? 'Waiting' }}
                                                           
                                                        </td>
                                                    </tr>    
                                                    <tr>
                                                        <th>
                                                            Ticket Body
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->ticket_body }}
                                                           
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
