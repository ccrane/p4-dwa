<div class='p-2'>
    <div class='row shadow border rounded p-3'>
        <div class='col-md-2'>
            <img src='{{ $wine->bottle_image_url }}' alt='{{ $wine->name }} {{ $wine->vintage }}' height='150px'>
        </div>
        <div class='col-md-10  text-left'>
            <h6 class='card-subtitle text-muted'>{{ $wine->winery->name }}</h6>
            <h4 class="card-title ">{{ $wine->name }} {{ $wine->vintage }}</h4>
            <h6 class="card-subtitle text-muted">
                @include('modules.winery-country-regions', [
                    'winery' => $wine->winery
                ])
            </h6>
            <div class='row mt-6'>
                <div class='col-md-4'>
                    Average Rating: {{ $wine->reviews->avg('rating') }}
                </div>
                <div class='col-md-4'>
                    Price: ${{ round($wine->price, 2) }}
                </div>
            </div>
        </div>
    </div>
</div>
