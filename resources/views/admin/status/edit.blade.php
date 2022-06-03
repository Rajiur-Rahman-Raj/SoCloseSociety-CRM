@extends('layouts.app_backend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="card" style="margin-top:35px">
                    <h5 class="card-header">Update Status</h5>
                    <div class="card-body">
                        <form action="{{ route('status.update', $status->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group mt-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $status->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
