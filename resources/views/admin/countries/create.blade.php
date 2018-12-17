@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Add New Country</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/countries'>
                            {{ csrf_field() }}

                            <div class='d-flex justify-content-center'>* Required fields</div>

                            <div class="form-group">
                                <label for="name">* Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @include('modules.field-error', ['field' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="iso_code">* ISO Code</label>
                                <input type="text" class="form-control" id="iso_code" name='iso_code' value="{{ old('iso_code') }}">
                                @include('modules.field-error', ['field' => 'iso_code'])
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left">
                                    @include('modules.alert')
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/admin/countries'>Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
