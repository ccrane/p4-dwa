{{ $winery->country->iso_code }} &middot; {{ $winery->region->name }}
@if($winery->region->region)
    &nbsp;&middot;&nbsp;{{ $winery->region->region->name }}
    @if($winery->region->region->region)
        &nbsp;&middot;&nbsp;{{ $winery->region->region->region->name }}
        @if($winery->region->region->region->region)
            &nbsp;&middot;&nbsp;{{ $winery->region->region->region->region->name }}
        @endif
    @endif
@endif
