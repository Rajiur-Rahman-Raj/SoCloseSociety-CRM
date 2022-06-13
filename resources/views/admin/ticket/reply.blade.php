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
                                <h4 class="card-title"> Ticket Reply <span class="text-danger" style="font-size:16px; text-decoration:underline"> ( #{{ $id }} )</span>   </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="{{ route('ticket_reply.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                              <input type="hidden" name="ticket_id" value="{{ $id }}" class="form-control">
                                              <label for="exampleInputEmail1" class="form-label">Reply</label>
                                              <textarea name="reply" id="reply_icon" class="form-control reply-text-area" cols="30" rows="5" placeholder="write something"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Reply</button>
                                          </form>
                                    </div>

                                </div>

                                    @foreach ($all_reply_individual_tickets as $ticket)
                                    @if ($ticket->user_id == Auth::id())
                                    <div class="row">
                                    <div class="col-md-8">
                                        <figure class="relply-section">
                                            <blockquote class="blockquote" >
                                                <span style="font-size:18px; font-style:italic">{{ $ticket->get_user_name_from_ticket->name }} - </span>
                                                <span class="text-dark" style="font-size: 14px"> {{ $ticket->created_at->diffForHumans() }}</span>

                                            <p></p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer">
                                                <p class="float-left"> {{ $ticket->reply }}
                                                    <span><a href="#reply_icon" style="float: right; font-size: 18px;"> </a></span>
                                                </p>

                                                <div class="clear"></div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    </div>
                                    @else
                                    <div class="row">
                                    <div class="col-md-8  ms-auto">
                                        <figure class="relply-section">
                                            <blockquote class="blockquote" >
                                                <span style="font-size:18px; font-style:italic">{{ $ticket->get_user_name_from_ticket->name }} - </span>
                                                <span class="text-dark" style="font-size: 14px"> {{ $ticket->created_at->diffForHumans() }}</span>

                                            <p></p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer">
                                                <p class="float-left"> {{ $ticket->reply }}
                                                    <span><a href="#reply_icon" style="float: right; font-size: 18px;"> <i class="fa-solid fa-reply-all" class="replay-icon-css"></i> </a></span>
                                                </p>

                                                <div class="clear"></div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    </div>
                                    @endif

                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
