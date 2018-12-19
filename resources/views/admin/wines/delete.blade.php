@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Delete Wine</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/wineries/{{ $wine->winery->id }}/wines/{{ $wine->id }}'>
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label><b>Name: </b> {{ $wine->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Country: </b>{{ $wine->country->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Regions &middot; Sub-Regions: </b>@include('modules.wine-regions', ['region' => $wine->region])</label>
                            </div>
                            <div class="form-group">
                                <label><b>Wine Type: </b>{{ $wine->type->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Grape Variety: </b>{{ $wine->variety->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Vintage: </b>{{ $wine->vintage }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Price: </b>${{ number_format($wine->price, 2) }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Bottle Image: </b></label><br />
                                <img src='{{ $wine->bottle_image_url }}' alt='{{ $wine->name }} {{ $wine->vintage }}' height='150px'>
                            </div>
                            <div class="form-group">
                                <label><b>Description :</b></label>
                                <p>{{ $wine->description }}</p>
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left text-danger font-weight-bold">
                                    Are you sure you want to delete?
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/admin/wineries/{{ $wine->winery->id }}'>Cancel</a>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
