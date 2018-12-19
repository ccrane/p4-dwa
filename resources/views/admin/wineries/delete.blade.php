@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Delete Winery</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/wineries/{{ $winery->id }}'>
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label><b>Name: </b> {{ $winery->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Country: </b>{{ $winery->country->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><b>Regions &middot; Sub-Regions: </b>@include('modules.winery-country-regions', ['winery' => $winery])</label>
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left text-danger font-weight-bold">
                                    Are you sure you want to delete?
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/admin/wineries'>Cancel</a>
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
