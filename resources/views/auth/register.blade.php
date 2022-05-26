@extends('layouts.app')
@section('content')

@php
$flag = true;    
@endphp
    <script> //会員登録の警告文の処理 //変更点(5/25)
        window.addEventListener('load', function() {
            if(!sessionStorage.getItem('w_text')) {
                sessionStorage.setItem('w_text', 'on');
                let pass = document.getElementsByClassName('pass');
                pass[0].style.display = "inline";
                pass[1].style.display = "inline";
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
                    <span class="err_msg">{{ $error }}</span>
                @endforeach
            </p>
            <p>
                <label>住所<br> {{-- 変更点 5/25 --}}
                <input type="text" name="address" value="{{ old('address') }}" placeholder="東京都新宿区西新宿2-8-1"></label>
                @foreach($errors->get('address') as $error)
                    <span class="err_msg">{{ $error }}</span>
                @endforeach
            </p>
            <p>
                <label>電話番号<br>
                <input type="text" name="tel_number" value="{{ old('tel_number') }}" placeholder="09012345678"></label>
                @foreach($errors->get('tel_number') as $error)
                    <span class="err_msg">{{ $error }}</span>
                @endforeach
            </p>
            <p>
                <label>メールアドレス<br>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="aaaa@co.jp"></label>
                @foreach($errors->get('email') as $error)
                    <span class="err_msg">{{ $error }}</span>
                @endforeach
            </p>
            <p>
                <label>生年月日<br>
                <input type="text" name="birthday" value="{{ old('birthday') }}" placeholder="20220101"></label>
                @foreach($errors->get('birthday') as $error)
                    @php
                        $target = array('Ymd形式','today');
                        $replace  = array('西暦', '今日');
                        $err = str_replace($target,$replace,$error)
                    @endphp                
                    <span class="err_msg">{{ $err }}</span>
                @endforeach
            </p>
            <p>
                <label>パスワード<br>
                <input type="password" name="password" id="password" placeholder="password"></label>
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                        <span class="err_msg">{{ $error }}</span>
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
                        <span class="err_msg">{{ $error }}</span>
                    @endforeach
                @else
                    <span class="pass">※8文字以上で記述して下さい！</span>
                @endif
            </p>
            <p> {{-- 変更点 5/25 --}}
                <button type="button"  onclick="location.href='{{ route('login') }}'" class="btn-r" id="login">ログイン</button>
                <button type="submit" id="conf" class="btn-b">確認画面へ</button>
            </p>
        </form>
    </div>
</body>


@endsection