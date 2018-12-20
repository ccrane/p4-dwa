<div class='row'>
    @if($user_details == true)
        <div class='col-md-6 text-left'>
            <div class='row'>
                <div class='col-md-3'>
                    <img src='http://cdn.onlinewebfonts.com/svg/img_299586.png' width='50px'>
                </div>
                <div class='col-md-9'>
                    <h5 class='card-title'>{{ $review->user->name }}</h5>
                    <div>{{ $review->user->reviews->count() }} Ratings</div>
                    <div class='card-text text-muted'>Rated on {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</div>
                </div>
            </div>
        </div>
    @else
        <div class='col-md-2 text-left'>
            <img src='http://cdn.onlinewebfonts.com/svg/img_299586.png' width='50px'>
        </div>
    @endif
    <div class='col-md-8 text-left'>
        <p>Rating: {{ $review->rating }}</p>
        <p>{{ $review->comment }}</p>
    </div>
</div>
