@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Countries &amp; Regions</h5>
                    <div class="card-body">
                        @include('modules.alert')
                        <form id='frm-country-search' method='GET' action='/admin/countries'>
                            {{ csrf_field() }}
                            <div class='d-flex justify-content-between align-items-center my-2'>
                                @include('modules.page-size', ['perPageSize' => $perPageSize])
                                <div class='form-row'>
                                    <label for="searchText" class="col-sm-2 col-form-label">Find:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="searchText" name="searchText" value='{{ $searchText }}'>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" class="btn btn-link"><i class="fas fa-search fa-lg"></i></button>
                                    </div>
                                </div>
                                <div class='text-right'>
                                    <a href='/admin/countries/create' title='Add Country'><i class="fas fa-plus fa-2x"></i></a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" style='width: 20%;'>ID</th>
                                <th scope="col" style='width: 40%;'>Name</th>
                                <th scope="col" style='width: 20%;'>ISO Code</th>
                                <th scope="col" style='width: 20%;'></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td scope="row"><strong>{{ $country->id }}</strong></td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->iso_code }}</td>
                                    <td class='d-flex justify-content-center'>
                                        <a href='/admin/countries/{{ $country->id }}/edit' title='Edit Country'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/countries/{{ $country->id }}/delete' title='Delete Country'><i class="far fa-trash-alt fa-lg"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-middle justify-content-center">
                        {{ $countries->appends(['perPageSize' => $perPageSize, 'searchText' => $searchText])->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
