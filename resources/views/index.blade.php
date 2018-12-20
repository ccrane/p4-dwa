@extends('layouts.master')

@section('content')

    <div class="container-fluid m-5">
        <h3 class="card-title text-center"><strong>UnCorked! World Famous Wine List</strong></h3>
        @foreach($wines as $wine)
            <div class="row justify-content-center my-5">
                <div class="col-9">
                    <div class="card text-center">
                        <div class="card-header">
                            @include('modules.wine-details', ['wine' => $wine])
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-center">
        {{ $wines->links() }}
    </div>

@endsection
