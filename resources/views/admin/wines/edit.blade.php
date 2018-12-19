@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Edit Wine - {{ $wine->winery->name }}</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/wineries/{{ $wine->winery->id }}/wines/{{ $wine->id }}'>
                            {{ method_field('put') }}
                            {{ csrf_field() }}

                            <div class='d-flex justify-content-center'>* Required fields</div>

                            <div class="form-group">
                                <label for="name">* Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $wine->name) }}">
                                @include('modules.field-error', ['field' => 'name'])
                            </div>
                            <div class="form-group">
                                <label for="country">* Country</label>
                                <select id='country' name='country' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    @foreach($countries as $country)
                                        <option value='{{ $country->id }}' {{ old('country', $wine->country_id) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'country'])
                            </div>
                            <div class="form-group">
                                <label for="region">* Region</label>
                                <select id='region' name='region' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    @foreach($regions as $region)
                                        <option value='{{ $region->id }}' {{ old('region', $wine->region_id) == $region->id ? 'selected' : '' }}>
                                            @include('modules.wine-regions', [
                                                'regions' => $regions
                                             ])
                                        </option>
                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'region'])
                            </div>
                            <div class="form-group">
                                <label for="type">* Wine Type</label>
                                <select id='type' name='type' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    @foreach($winetypes as $type)
                                        <option value='{{ $type->id }}' {{ old('type', $wine->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'type'])
                            </div>
                            <div class="form-group">
                                <label for="variety">* Grape Variety</label>
                                <select id='variety' name='variety' class="form-control">
                                    <option value=''>-- Select One --</option>
                                    @foreach($varieties as $variety)
                                        <option value='{{ $variety->id }}' {{ old('variety', $wine->variety_id) == $variety->id ? 'selected' : '' }}>{{ $variety->name }}</option>
                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'variety'])
                            </div>
                            <div class="form-group">
                                <label for="vintage">* Vintage</label>
                                <input type="text" class="form-control col-md-3" id="vintage" name="vintage" value="{{ old('vintage', $wine->vintage) }}">
                                @include('modules.field-error', ['field' => 'vintage'])
                            </div>
                            <div class="form-group">
                                <label for="price">* Price</label>
                                <input type="text" class="form-control col-md-3" id="price" name="price" value="{{ old('price', number_format($wine->price, 2, '.', '')) }}">
                                @include('modules.field-error', ['field' => 'price'])
                            </div>
                            <div class="form-group">
                                <label for="bottleImageUrl">* Bottle Image URL</label>
                                <input type="text" class="form-control " id="bottleImageUrl" name="bottleImageUrl" value="{{ old('bottleImageUrl', $wine->bottle_image_url) }}" placeholder='http://'>
                                @include('modules.field-error', ['field' => 'bottleImageUrl'])
                            </div>
                            <div class="form-group">
                                <label for="description">* Description</label>
                                <textarea class="form-control " id="description" name="description">{{ old('description', $wine->description) }}</textarea>
                                @include('modules.field-error', ['field' => 'description'])
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left">
                                    @include('modules.alert')
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/admin/wineries/{{ $winery->id }}'>Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
