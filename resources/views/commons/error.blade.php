@if ($errors->has($col))
  @foreach($errors->get($col) as $message)
    <span class="error">{{ $message }} </span>
  @endforeach
@endif