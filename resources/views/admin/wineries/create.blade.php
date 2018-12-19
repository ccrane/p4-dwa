@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Add New Winery</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/wineries'>
                            {{ csrf_field() }}

                            <div class='d-flex justify-content-center'>* Required fields</div>

                            <div class="form-group">
                                <label for="name">* Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @include('modules.field-error', ['field' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="country">* Country</label>
                                <select id='country' name='country' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    @foreach($countries as $country)
                                        <option value='{{ $country->id }}' {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'country'])
                            </div>
                            <div class="form-group">
                                <label for="region">* Region</label>
                                <select id='region' name='region' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    @foreach($regions as $region)
                                        <option value='{{ $region->id }}' {{ old('region') == $region->id ? 'selected' : '' }}>
                                            @include('modules.wine-regions', [
                                                'regions' => $regions
                                             ])
                                        </option>
                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'region'])
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left">
                                    @include('modules.alert')
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/admin/wineries'>Cancel</a>
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
