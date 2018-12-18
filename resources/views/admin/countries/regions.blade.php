@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-7">
                <div class="card text-center">
                    <h5 class="card-header">Regions of {{ $country->name }}</h5>
                    <div class="card-body">
                        @include('modules.alert')
                        <div class='d-flex justify-content-end align-items-center my-2'>
                            <a href='/admin/countries/{{ $country->id }}/regions/create'
                               title='Add Region'><i class="fas fa-plus fa-2x"></i></a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" style='width: 15%;'>ID</th>
                                <th class='text-left' scope="col" style='width: 60%;'>Region &middot; Sub Regions</th>
                                <th scope="col" style='width: 25%;'></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($country->regions as $region)
                                <tr>
                                    <td scope="row"><strong>{{ $region->id }}</strong></td>
                                    <td class='text-left'>{{ $region->name }}</td>
                                    <td class='text-right'>
                                        <a href='/admin/countries/{{ $country->id }}/regions/{{ $region->id }}/create'
                                           title='Add Sub-Region'><i class="fas fa-plus fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/countries/{{ $country->id }}/regions/{{ $region->id }}/edit'
                                           title='Edit Sub-Region'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                        <a href='/admin/countries/{{ $country->id }}/regions/{{ $region->id }}/delete'
                                           title='Delete Sub-Region'><i class="far fa-trash-alt fa-lg"></i></a>
                                    </td>
                                </tr>
                                @if($region->regions && ($region->regions->count() > 0))
                                    @foreach($region->regions as $subregion1)
                                        <tr>
                                            <td scope="row"><strong>{{ $subregion1->id }}</strong></td>
                                            <td class='text-left'>{{ $region->name }} &middot; {{ $subregion1->name }}</td>
                                            <td class='text-right'>
                                                <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion1->id }}/create'
                                                   title='Add Sub-Region'><i class="fas fa-plus fa-lg"></i></a>&nbsp;&nbsp;
                                                <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion1->id }}/edit'
                                                   title='Edit Sub-Region'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                                <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion1->id }}/delete'
                                                   title='Delete Sub-Region'><i class="far fa-trash-alt fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        @if($subregion1->regions && ($subregion1->regions->count() > 0))
                                            @foreach($subregion1->regions as $subregion2)
                                                <tr>
                                                    <td scope="row"><strong>{{ $subregion2->id }}</strong></td>
                                                    <td class='text-left'>{{ $region->name }} &middot; {{ $subregion1->name }} &middot; {{ $subregion2->name }}</td>
                                                    <td class='text-right'>
                                                        <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion2->id }}/create'
                                                           title='Add Sub-Region'><i class="fas fa-plus fa-lg"></i></a>&nbsp;&nbsp;
                                                        <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion2->id }}/edit'
                                                           title='Edit Sub-Region'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                                        <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion2->id }}/delete'
                                                           title='Delete Sub-Region'><i class="far fa-trash-alt fa-lg"></i></a>
                                                    </td>
                                                </tr>
                                                @if($subregion2->regions && ($subregion2->regions->count() > 0))
                                                    @foreach($subregion2->regions as $subregion3)
                                                        <tr>
                                                            <td scope="row"><strong>{{ $subregion3->id }}</strong></td>
                                                            <td class='text-left'>{{ $region->name }} &middot; {{ $subregion1->name }} &middot; {{ $subregion2->name }} &middot; {{ $subregion3->name }}</td>
                                                            <td class='text-right'>
                                                                <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion3->id }}/edit'
                                                                   title='Edit Sub-Region'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                                                <a href='/admin/countries/{{ $country->id }}/regions/{{ $subregion3->id }}/delete'
                                                                   title='Delete Sub-Region'><i class="far fa-trash-alt fa-lg"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

