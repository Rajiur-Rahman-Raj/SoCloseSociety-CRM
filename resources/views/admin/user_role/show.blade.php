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
                                <h4 class="card-title">User Role Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th class="table_header_show">Role</th>
                                                        <td>{{ $single_role_info->role }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="table_header_show">Permissions</th>
                                                        <td>
                                                            @php
                                                                $permission = json_decode($single_role_info->permission);
                                                            @endphp
                                                            @foreach ($permission as $data)
                                                                {{ App\Models\Navigation::find($data)->name ?? '' }},
                                                            @endforeach

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('user_role.index') }}">Return Back</a>

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
