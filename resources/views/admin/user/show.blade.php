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
                                                        <th class="table_header_show">
                                                             Name
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->name }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th class="table_header_show">
                                                            Role
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->getRole->role }}

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th class="table_header_show">
                                                            Permission
                                                        </th>
                                                        <td>
                                                            @php
                                                                $all_data = json_decode($all_user_data->permission);
                                                            @endphp
                                                            @foreach ($all_data as $item)

                                                                {{ App\Models\Navigation::find($item)->name }} |
                                                            @endforeach
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th class="table_header_show">
                                                            Phone
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->phone }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="table_header_show">
                                                            Email
                                                        </th>
                                                        <td>
                                                            {{ $all_user_data->email }}
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
