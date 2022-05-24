@extends('layouts.app')

@section('content')
    <h1>この教科書を購入します。よろしいですか？</h1>
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
    </dl>
    <form action="{{ route('stocks.buy', $stock->id) }}" method="post">
        @csrf
        <div align="center">
            <button type="submit" class="bg-blue-500 hover:bg-gray-800 text-white rounded px-4 py-2">購入する</button>
        </div>
    </form>
    <a href="{{ route('stocks.show', $stock->id) }}"><button class="bg-gray-500 hover:bg-gray-800 text-white rounded px-4 py-2">キャンセル</button></a>
@endsection