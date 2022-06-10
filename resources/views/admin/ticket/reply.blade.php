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
                                <h4 class="card-title"> Ticket Reply </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="{{ route('ticket_reply.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                              <input type="hidden" name="ticket_id" value="{{ $id }}" class="form-control">
                                              <label for="exampleInputEmail1" class="form-label">Reply</label>
                                              <textarea name="ticket_reply" id="ticket_reply" class="form-control" cols="30" rows="5" placeholder="write something"></textarea>
                    
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
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
