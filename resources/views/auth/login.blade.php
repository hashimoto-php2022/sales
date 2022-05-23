<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<h1 style="text-align:center">ログイン</h1>
@include('commons/flash')
<form action="{{route('login')}}"method="post"><br>
    @csrf
    <p style="text-align:center">
        <label>メールアドレス</label><br>
        <input type="email" name="email" value="{{old('email')}}">
</p>
<p  style="text-align:center" >
    <label style="text-align:center">パスワード</label><br>
    <input type="password" name="password" value="">
</p><br><br>
<p  style="text-align:center" >
    <a href="{{ route('register') }}">会員登録</a>
    <button type="submit">ログイン</button>
</p>
</form>
</body>
</html>