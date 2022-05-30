@extends('layouts.app')
@section('content')

<h1>マイページ</h1>


<p style="text-align:center">
    <a href="{{ route('home.show' , $id ) }}" class="btn-b">会員情報</a>

    <a href="{{ route('sales.create') }}" class="btn-black">教科書登録</a>

    <a href="{{ route('home.history', $id) }}" class="btn-g">購入履歴</a>
    
</p><br>

<h3 style="">自分の出品している教科書</h3>
@include('sales/card')
{{-- @include('commons/textbook') --}}

@endsection