@extends('layouts.admin.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-9">
                <div class="card text-center">
                    <div class="card-header">
                        <h4>{{ $user->name }}</h4>
                        <h6 class="card-subtitle text-muted">
                            {{ $user->email }}
                        </h6>
                    </div>
                    <div class="card-body">
                        @if($user->reviews->count() > 0)
                            @foreach($user->reviews as $review)
                                <h4 class='card-subtitle text-left'>{{ $review->wine->name }}</h4>
                                @include('modules.review', [
                                    'review' =>$review,
                                    'user_details' => false
                                ])
                            @endforeach
                        @else
                            <p class="card-text text-left text-muted">No wines have been added for {{ $wine->name }}.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

