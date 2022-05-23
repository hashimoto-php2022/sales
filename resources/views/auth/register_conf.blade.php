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

        #main {
            position: relative;
            left: 36em;
        }

        #h2_text{
            position: relative;
            left: -2em;
        }

        .btn{
            width: 120px;
            height: 40px;
        }

        #btn_hs{
            position: relative;
            left: -4em;
        }
    </style>
</head>
<body>
    <div id="main">
    <h1>会員登録確認</h1>
    <h2 id="h2_text">この内容でよろしいですか？</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <p>
                <label>名前<br>
                {{-- disabledだとformで送れない --}}
                <input type="text" name="name" value="{{ $auth->name }}" readonly></label>
            </p>
            <p>
                <label>住所<br>
                <input type="text" name="address" value="{{ $auth->address }}" readonly></label>
            </p>
            <p>
                <label>電話番号<br>
                <input type="text" name="tel_number" value="{{ $auth->tel_number }}" readonly></label>
            </p>
            <p>
                <label>メールアドレス<br>
                <input type="email" name="email" value="{{ $auth->email }}" readonly></label>
            </p>
            <p>
                <label>生年月日<br>
                <input type="text" name="birthday" value="{{ $auth->birthday }}" readonly></label>
            </p>
            <p>
                <label>パスワード<br>
                <input type="password" name="password" value="{{ $auth->password }}" readonly></label>
                 ※8文字以上で記述して下さい！
            </p>
            <p>
                <label>パスワード（確認用）<br>
                <input type="password" name="password_confirmation" value="{{ $auth->password_confirmation }}" readonly></label>
                 ※8文字以上で記述して下さい！
            </p>
            <p>
                <button type="button" onclick="history.back()" class="btn" id="btn_hs">キャンセル</button>
                <button type="submit" class="btn">OK</button>
            </p>
        </form>
    </div>
    </body>
</html>