@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-9">
                <div class="card text-center">
                    <h5 class="card-header">Wineries</h5>
                    <div class="card-body">
                        @include('modules.alert')
                        <form id='frm-winery-search' method='GET' action='/admin/wineries'>
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
                                    <a href='/admin/wineries/create' title='Add Winery'><i class="fas fa-plus fa-2x"></i></a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped">
                            <caption class='text-right'>{{$wineries->total()}} wineries found.</caption>
                            <thead>
                            <tr>
                                <th scope="col" style='width: 15%;'>ID</th>
                                <th scope="col" style='width: 2o%;'>Name</th>
                                <th scope="col" style='width: 35%;'>Country &middot; Region &middot; Sub-Regions</th>
                                <th scope="col" style='width: 15%;'>Wines</th>
                                <th scope="col" style='width: 15%;'></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wineries as $winery)
                                <tr>
                                    <td scope="row"><strong>{{ $winery->id }}</strong></td>
                                    <td>{{ $winery->name }}</td>
                                    <td>
                                        @include('modules.winery-country-regions', [
                                            'winery' => $winery
                                        ])
                                    </td>
                                    <td>{{ $winery->wines->count() }}</td>
                                    <td class='d-flex justify-content-center'>
                                        <a href='/admin/wineries/{{ $winery->id }}' title='View Winery'><i class="far fa-file-alt fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/wineries/{{ $winery->id }}/edit' title='Edit Winery'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/wineries/{{ $winery->id }}/delete' title='Delete Winery'><i class="far fa-trash-alt fa-lg"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($wineries->total() > $wineries->perPage())
                            <div class="d-flex align-items-center justify-content-center">
                                {{ $wineries->appends(['perPageSize' => $perPageSize, 'searchText' => $searchText])->links() }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
