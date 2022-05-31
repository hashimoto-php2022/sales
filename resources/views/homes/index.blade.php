@extends('layouts.app')
@section('content')

<h1>マイページ</h1>


<p style="text-align:center">
    <a href="{{ route('home.show' , $id ) }}" class="btn-b sm:m-3">会員情報</a>

    <a href="{{ route('sales.create') }}" class="btn-black sm:m-3">教科書登録</a>

    <a href="{{ route('home.history', $id) }}" class="btn-g sm:m-3">購入履歴</a>
    
    <a href="{{ route('home.subject_history', $id) }}" class="btn-r">登録履歴</a>
</p><br>

<h3 style="">自分の出品している教科書</h3>
@if($stocks->count() == 0)
    <p>まだ出品していません</p>
@endif
@include('sales/card')


@endsection