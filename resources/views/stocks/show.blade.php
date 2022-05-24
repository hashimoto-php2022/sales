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
    </dl>

    <a href="{{ route('stocks.index') }}"><button>教科書一覧へ</button></a>
@endsection