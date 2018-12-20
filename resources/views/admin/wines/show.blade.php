@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center my-5">
            <div class="col-9">
                <div class="card text-center">
                    <div class="card-header">
                        @include('modules.wine-details', ['wine' => $wine])
                    </div>
                    <div class="card-body">
                        @include('modules.alert')
                        @if($wine->reviews->count() > 0)
                            @foreach($wine->reviews as $review)
                                <div class='p-2'>
                                    @include('modules.review', ['review' =>$review, 'user_details' => true])
                                </div>
                            @endforeach
                        @else
                            <p class="card-text text-left text-muted">No reviews have been added for {{ $wine->name }}.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

