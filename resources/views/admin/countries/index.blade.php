@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Countries &amp; Regions</h5>
                    <div class="card-body">
                        @include('modules.pagesize', ['perPageSize' => $perPageSize])
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">ISO Code</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td scope="row"><strong>{{ $country->id }}</strong></td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->iso_code }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-center">
                        {{ $countries->appends(['perPageSize' => $perPageSize])->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
