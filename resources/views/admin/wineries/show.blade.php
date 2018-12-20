@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-9">
                <div class="card text-center">
                    <div class="card-header">
                        <h4>{{ $winery->name }}</h4>
                        <h6 class="card-subtitle text-muted">
                            @include('modules.winery-country-regions', [
                                'winery' => $winery
                            ])
                        </h6>
                    </div>
                    <div class="card-body">
                        @include('modules.alert')
                        <div class='text-right'>
                            <a href='/admin/wineries/{{ $winery->id }}/wines/create' title='Add Wine'><i class="fas fa-plus fa-2x"></i></a>
                        </div>
                        @if($winery->wines->count() > 0)
                            @foreach($winery->wines as $wine)
                                @include('modules.wine-details-with-review', [
                                    'wine' =>$wine,
                                    'isadmin' => true
                                ])
                            @endforeach
                        @else
                            <p class="card-text text-left text-muted">No wines have been added for {{ $winery->name }}.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

