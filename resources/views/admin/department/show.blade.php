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
                                <h4 class="card-title">Department </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th> Name</th>
                                                        <td>{{ ucwords($department->name) }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Role</th>
                                                        <td>{{ $department->get_role->role }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            Agents
                                                        </th>
                                                        <td>
                                                            @php
                                                                $dept = json_decode($department->user_id);
                                                            @endphp
                                                            @foreach ($dept as $item)
                                                                {{ ucwords(App\Models\User::find($item)->name) }} ,
                                                            @endforeach
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('department.index') }}">Return Back</a>

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
