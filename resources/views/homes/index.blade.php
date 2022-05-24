@extends('layouts.app')
@section('content')

<font size="6">マイページ</font>
<br><br>

<p style="text-align:center">
    <a href="{{ route('register') }}">会員情報</a>

    <a href="{{ route('register') }}">教科書登録</a>

    <a href="{{ route('register') }}">教科書一覧</a>
</p>

@include('commons/textbook')
@endsection