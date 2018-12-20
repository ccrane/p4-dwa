@extends('layouts.user.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-5">
                <div class="card text-center">
                    <h5 class="card-header">Add New Review</h5>
                    <div class="card-body text-left">
                        <form method='POST' action='/admin/countries'>
                            {{ csrf_field() }}

                            <div class='d-flex justify-content-center'>* Required fields</div>

                            <div class="form-group">
                                <label for="wine">* Wine</label>
                                <select class='form-control' id='wine' name='wine'>
                                    <option value=''>-- Select One --</option>
                                    @foreach($wines as $wine)
                                        <option value='{{ $wine->id }}' {{ old('wine') == $wine->id ? 'selected' : '' }}>{{ $wine->name }}</option>
                                    @endforeach
                                </select>
'                                @include('modules.field-error', ['field' => 'wine'])
                            </div>
                            <div class="form-group">
                                <label for="ratinge">* Rating</label>
                                <input type="text" class="form-control col-md-3" id="rating" name='rating' value="{{ old('rating') }}">
                                @include('modules.field-error', ['field' => 'rating'])
                            </div>
                            <div class="form-group">
                                <label for="review">* Review</label>
                                <textarea class="form-control" id="review" name='review'>{{ old('review') }}</textarea>
                                @include('modules.field-error', ['field' => 'review'])
                            </div>
                            <div class="row ">
                                <div class="col-8 text-left">
                                    @include('modules.alert')
                                </div>
                                <div class="col-4 text-right">
                                    <a role='button' class='btn btn-secondary' href='/users/home'>Cancel</a>
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
