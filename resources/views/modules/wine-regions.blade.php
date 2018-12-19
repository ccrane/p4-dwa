{{ $region->country->iso_code }}
@if($region->region)
    @if($region->region->region)
        @if($region->region->region->region)
            &nbsp;&middot;&nbsp;{{ $region->region->region->region->name }}
        @endif
        &nbsp;&middot;&nbsp;{{ $region->region->region->name }}
    @endif
    &nbsp;&middot;&nbsp;{{ $region->region->name }}
@endif
&nbsp;&middot;&nbsp;{{ $region->name }}
