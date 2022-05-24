@extends('layouts.app')
@section('content')
    <h1>教科書詳細</h1>
    <dl>
        <dt>教科書名</dt>
        <dd>{{ $stock->subject->title }}</dd>
        <dt>著者名</dt>
        <dd>{{ $stock->subject->author }}</dd>
        <dt>分類</dt>
        <dd>{{ $stock->subject->class_id }}</dd>
        <dt>値段</dt>
        <dd>{{ $stock->price }}</dd>
        <dt>状態</dt>
        <dd>{{ $stock->status }}</dd>
        <dt>在庫</dt>
        <dd>{{ $stock->stock }}</dd>
        <dt>備考</dt>
        <dd>{{ $stock->remarks }}</dd>
    </dl>
    <div align="center">
        <a href="{{ route('sales.index') }}"><button class="bg-gray-500 hover:bg-gray-800 text-white rounded px-4 py-2">教科書一覧へ</button></a>
        @if($stock->user_id === Auth::id())
            <a href="{{ route('sales.edit', $stock->id) }}"><button class="bg-blue-500 hover:bg-gray-800 text-white rounded px-4 py-2 ">編集</button></a>        
        @else
            @if($stock->stock == 1)
                <a href="{{ route('sales.cart', $stock->id) }}"><button class="bg-blue-500 hover:bg-gray-800 text-white rounded px-4 py-2">購入する</button></a>
            @else
                <button disabled="disabled" class="bg-gray-300 text-white rounded px-4 py-2 ">在庫がありません</button>
            @endif
        @endif
    </div>
@endsection