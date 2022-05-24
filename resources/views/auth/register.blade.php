@extends('layouts.app')
@section('content')

    <script>
        window.addEventListener('load', function() {
            console.log("aaaa");
            if( !sessionStorage.getItem('disp_popup') ) {
                sessionStorage.setItem('disp_popup', 'on');
                console.log("aaaa");
                console.log(disp_popup);
                var pass = document.getElementByClassName('pass');
                console.log(pass,"a");
                pass.style.display = "none";
            }
        }, false);
    </script>
</head>
<body>
    <h1 class="title">新規会員登録</h1>
    <div class="main">
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
                <input type="password" name="password" id="password" placeholder="password"></label>
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                        {{ $error }}
                    @endforeach
                @else
                    <span class="pass">※8文字以上で記述して下さい！</span>
                @endif
            </p>
            <p>
                <label>パスワード（確認用）<br>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password"></label>
                @if($errors->has('password_confirmation'))
                    @foreach($errors->get('password_confirmation') as $error)
                        {{ $error }}
                    @endforeach
                @else
                    <span class="pass">※8文字以上で記述して下さい！</span>
                @endif
            </p>
            <p>
                <a href="{{ route('login') }}" id="rogin" class="w-56 h-30 px-6 font-semibold rounded-full bg-violet-600 text-white">ログイン</a>
                <button type="submit" id="conf" class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white">確認画面へ</button>
            </p>
        </form>
    </div>
</body>


@endsection