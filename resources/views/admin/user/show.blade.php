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
                                <h4 class="card-title">User </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                             Name
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->name }}
                                                        </td>
                                                    </tr>                                
                                                                                                            
                                                    <tr>
                                                        <th>
                                                            Role
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->getRole->role }}
                                                           
                                                        </td>
                                                    </tr>   
                                                    
                                                    <tr>
                                                        <th>
                                                            Permission
                                                        </th>
                                                        <td>
                                                            @php
                                                                $all_data = json_decode($all_user_data->permission);
                                                            @endphp
                                                            @foreach ($all_data as $item)
                                                               
                                                                {{ App\Models\Navigation::find($item)->name }} |
                                                            @endforeach
                                                            {{-- <img src="{{ asset('uploads/images/testimonial') }}/{{ $testimonial->user_photo }}" alt="not found" width="70" height="70"> --}}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            Phone
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->phone }}
                                                            {{-- <img src="{{ asset('uploads/images/testimonial') }}/{{ $testimonial->user_photo }}" alt="not found" width="70" height="70"> --}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->email }}
                                                            {{-- <img src="{{ asset('uploads/images/testimonial') }}/{{ $testimonial->user_photo }}" alt="not found" width="70" height="70"> --}}
                                                        </td>
                                                    </tr>
                                                                                                            
                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('users.index') }}">Return Back</a>

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