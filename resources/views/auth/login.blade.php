@extends('layouts.app')
@section('content')
<h1 style="text-align:center">ログイン</h1>
@foreach($errors->all() as $error)
 <p>{{ $error }}</p>
@endforeach
<form action="{{route('login')}}" method="post">
    @csrf
    <br>
    <p style="text-align:center">
        <label>メールアドレス</label><br>
        <input type="email" name="email" value="{{old('email')}}">
</p>
<p  style="text-align:center" >
    <label style="text-align:center">パスワード</label><br>
    <input type="password" name="password" value="">
</p><br><br>
<p style="text-align:center" >
    <button type="submit">ログイン</button>
</p><br>
<p  style="text-align:center" >
    <a href="{{ route('register') }}">会員登録</a>
</p>
</form>
@endsection