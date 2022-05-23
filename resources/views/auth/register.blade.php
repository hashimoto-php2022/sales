@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <style>
        /* body{ */
            /* スクロールを無効 */
            /* overflow: hidden; */
        /* } */

        /* #main {
            position: relative;
            left: 36em;
        }

        .btn{
            width: 120px;
            height: 40px;
        }

        #conf{
            position: relative;
            left: 4em;
        }

        #rogin{
            position: relative;
            left: -1em;
        }

        .alert{
            position: relative;
            left: 0;
        } */
    </style>
</head>
<body>
    <div id="main">
    <h1>新規会員登録</h1>
        <form action="{{ route('register_conf') }}" method="post">
            @csrf
            <p>
                <label>名前<br>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="山田 太郎"></label>
                @foreach($errors->get('name') as $error)
                    {{ $error }}
                @endforeach
            </p>
            <p>
                <label>住所<br>
                <input type="text" name="address" value="{{ old('address') }}" placeholder="東京都"></label>
                @foreach($errors->get('address') as $error)
                    {{ $error }}
                @endforeach
            </p>
            <p>
                <label>電話番号<br>
                <input type="text" name="tel_number" value="{{ old('tel_number') }}" placeholder="090-1234-5678"></label>
                @foreach($errors->get('tel_number') as $error)
                    {{ $error }}
                @endforeach
            </p>
            <p>
                <label>メールアドレス<br>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="aaaa@co.jp"></label>
                @foreach($errors->get('email') as $error)
                    {{ $error }}
                @endforeach
            </p>
            <p>
                <label>生年月日<br>
                <input type="text" name="birthday" value="{{ old('birthday') }}" placeholder="20220101"></label>
                @foreach($errors->get('birthday') as $error)
                    {{ $error }}
                @endforeach
            </p>
            <p>
                <label>パスワード<br>
                <input type="password" name="password" value=""  placeholder="password"></label>
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                        {{ $error }}
                    @endforeach
                @else
                    ※8文字以上で記述して下さい！
                @endif
            </p>
            <p>
                <label>パスワード（確認用）<br>
                <input type="password" name="password_confirmation" value=""  placeholder="password"></label>
                @if($errors->has('password_confirmation'))
                    @foreach($errors->get('password_confirmation') as $error)
                        {{ $error }}
                    @endforeach
                @else
                    ※8文字以上で記述して下さい！
                @endif
            </p>
            <p>
                <a href="{{ route('login') }}" id="rogin">ログイン</a>
                <button type="submit" class="btn" id="conf">確認画面へ</button>
            </p>
        </form>
    </div>
</body>
</html>

@endsection