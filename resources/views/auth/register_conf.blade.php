@extends('layouts.app')
@section('content')

    <h1 class="title">会員登録確認</h1>
    <div class="main">
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
            </p>
            <p>
                <label>パスワード（確認用）<br>
                <input type="password" name="password_confirmation" value="{{ $auth->password_confirmation }}" readonly></label>
            </p>
            <p>
                <button type="button" onclick="history.back()" class="btn-r" id="btn_hs">戻る</button>
                <button type="submit" class="btn-b" id="btn_ok">登録する</button>
            </p>
        </form>
    </div>

    @endsection