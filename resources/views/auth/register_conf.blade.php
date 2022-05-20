<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h1>会員登録確認</h1>
    <h2>これでよろしいですか？</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <p>
                <label>名前<br>
                <input type="text" name="name" value="{{ $auth->name }}"></label>
            </p>
            <p>
                <label>住所<br>
                <input type="text" name="adress" value="{{ $auth->adress }}"></label>
            </p>
            <p>
                <label>電話番号<br>
                <input type="text" name="tel_number" value="{{ $auth->tel_number }}"></label>
            </p>
            <p>
                <label>メールアドレス<br>
                <input type="email" name="email" value="{{ $auth->email }}"></label>
            </p>
            <p>
            <label>パスワード<br>
            <input type="password" name="password" value="{{ $auth->password }}"></label>
            </p>
            <p>
                <label>パスワード（確認用）<br>
                <input type="password" name="password_confirmation" value="{{ $auth->password_confirmation }}"></label>
            </p>
            <p>
                <button type="button" onclick="history.back()">キャンセル</button>
                <button type="submit">OK</button>
            </p>
        </form>
    </body>
</html>