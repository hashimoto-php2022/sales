@if ($errors->has($col))
  @foreach($errors->get($col) as $message)
    <span class="err_msg">{{ $message }} </span>
  @endforeach
@endif