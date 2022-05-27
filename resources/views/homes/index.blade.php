@extends('layouts.app')
@section('content')

<font size="5">マイページ</font>
<br><br>

<p style="text-align:center">
    <a href="{{ route('home.show' , $id ) }}" class="btn-b">会員情報</a>

    <a href="{{ route('sales.create') }}" class="btn-r">教科書登録</a>

    <a href="{{ route('sales.index') }}" class="btn-g" >教科書一覧</a>
    
</p><br>

<p style="text-align:center">自分の出品している教科書</p>

@include('commons/textbook')

@endsection