@extends('layouts.app')

@section('content')
<h1 style="text-align:center">ログイン</h1>
<form action="{{route('login')}}"method="post"><br>
    @csrf
    <p style="text-align:center">
        <label>メールアドレス</label><br>
        <input type="e_mail" name="e_mail" value="{{old('e_mail')}}">
</p>
<p  style="text-align:center" >
    <label style="text-align:center">パスワード</label><br>
    <input type="password" name="password" value="">
</p><br><br>
<p  style="text-align:center" >
    <button type="submit">ログイン</button>
</p><br>
<p  style="text-align:center" >
    <a href="{{ route('register') }}">会員登録</a>
</p>
</form>
@endsection