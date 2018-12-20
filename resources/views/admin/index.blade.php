@extends('layouts.admin.master')

@section('content')
    <div class="card-deck  p-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">{{ $users }}</p>
                <p class="card-text"><small class="text-muted">Total Users</small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Wineries</h5>
                <p class="card-text">{{ $wineries }}</p>
                <p class="card-text"><small class="text-muted">Total Wineries</small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Wines</h5>
                <p class="card-text">{{ $wines }}</p>
                <p class="card-text"><small class="text-muted">Total Wines</small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Reviews</h5>
                <p class="card-text">{{ $reviews }}</p>
                <p class="card-text"><small class="text-muted">Total Reviews</small></p>
            </div>
        </div>
    </div>
@endsection
