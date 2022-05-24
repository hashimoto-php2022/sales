@extends('layouts.app')

@section('content')

<form action="{{ route('home.post' , $user->id) }}"method="post">
    
    @csrf
    <dl>
        <dt>氏名</dt>
        <dd>
            <input type="text" name="name" value="{{ old('name' , $user->name) }}">
        </dd>
        <dt>住所</dt>
        <dd>
            <input type="text" name="address" value="{{ old('address' , $user->address) }}">
        </dd>
            <dt>電話番号</dt>
        <dd>
            <input type="text" name="tel_number" value="{{ old('tel_number' , $user->tel_number) }}">
        </dd>
        <dt>メールアドレス</dt>
        <dd>
            <input type="email" name="email" value="{{ old('email' , $user->email) }}">
</dd>
<input type="hidden" name="id" value="{{ $user->id }}">
        <button type="submit">更新</button>
</dl>
</form>
@endsection
