@if(session('alert'))
    <div class='alert {{ session('success') ? 'alert-success' : 'alert-danger' }}'>
        {{ session('alert') }}
    </div>
@endif
