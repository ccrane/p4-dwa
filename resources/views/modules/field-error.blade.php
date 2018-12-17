@if($errors->get($field))
    <div class='text-danger'>{{ $errors->first($field) }}</div>
@endif
