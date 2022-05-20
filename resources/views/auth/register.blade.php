<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h1>会員登録</h1>
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
        <form action="{{ route('register') }}" method="post">
            @csrf
            <p>
                <label>名前<br>
                <input type="text" name="name" value="{{ old('name') }}"></label>
            </p>
            <p>
                <label>住所<br>
                <input type="text" name="address" value="{{ old('address') }}"></label>
            </p>
            <p>
                <label>電話番号<br>
                <input type="text" name="tel_number" value="{{ old('tel_number') }}"></label>
            </p>
            <p>
                <label>メールアドレス<br>
                <input type="email" name="email" value="{{ old('email') }}"></label>
            </p>
            <p>
            <label>パスワード<br>
            <input type="password" name="password" value=""></label>
            </p>
            <p>
                <label>パスワード（確認用）<br>
                <input type="password" name="password_confirmation" value=""></label>
            </p>
            <p>
                <button type="submit">確認画面へ</button>
            </p>
            <p>または</p>
            <p>
                <a href="{{ route('login') }}">ログイン</a>
            </p>
        </form>
</body>
</html>