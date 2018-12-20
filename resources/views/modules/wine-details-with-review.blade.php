
    <div class='p-2'>
    <div class='row shadow border rounded p-3'>
        <div class='col-md-2'>
            <img src='{{ $wine->bottle_image_url }}' alt='{{ $wine->name }} {{ $wine->vintage }}' height='150px'>
        </div>
        <div class='col-md-4  text-left'>
            <h5 class="card-title ">{{ $wine->name }} {{ $wine->vintage }}</h5>
            <div class='row'>
                <div class='col-md-12 text-left'>
                    <h6 class='card-subtitle text-muted'>{{ $wine->winery->name }}</h6>
                </div>
            </div>
            <div class='row mt-6'>
                <div class='col-md-6'>
                    Average Rating: {{ $wine->reviews->avg('rating') }}
                </div>
                <div class='col-md-6'>
                    Price: ${{ round($wine->price, 2) }}
                </div>
            </div>
            @if($isadmin)
                <div class='row'>
                    <div class='col-md-12 text-right'>
                        <a href='/admin/wineries/{{ $wine->winery->id }}/wines/{{ $wine->id }}' title='View Wine'><i class="far fa-file-alt fa-lg"></i></a>&nbsp;&nbsp;
                        <a href='/admin/wineries/{{ $wine->winery->id }}/wines/{{ $wine->id }}/edit' title='Edit Wine'><i class="far fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                        <a href='/admin/wineries/{{ $wine->winery->id }}/wines/{{ $wine->id }}/delete' title='Delete Wine'><i class="far fa-trash-alt fa-lg"></i></a>
                    </div>
                </div>
            @endif
        </div>
        <div class='col-md-6 border-left'>
            @include('modules.review', ['review' => $wine->latestReview])
        </div>
    </div>
    </div>
