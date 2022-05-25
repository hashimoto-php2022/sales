@extends('layouts.app')
@section('content')



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除確認画面</title>
    <style>
        p {font-size:17px; color:red;}
        li {display:inline-block;}
    </style>
</head>
<body>
<dl>
    <dt>教科書名</dt>
    <dd>
    {{ $stock->subject->title }}
    </dd>
    <dt>著者名</dt>
    <dd>
    {{ $stock->subject->author }}
    </dd>
    <dt>分類</dt>
    <dd>
    {{ $stock->subject->class_id }}
    </dd>
    <dt>値段</dt>
    <dd>
    {{ $stock->price }}円
    </dd>
    <dt>状態</dt>
    <dd>
    {{ $stock->status }}
    </dd>
    <dt>在庫</dt>
    <dd>
    {{ $stock->stock }}
    </dd>
</dl>

<div align="center">
<p>この教科書を削除しますか？</p>

<!-- <a href="{{ route('stocks.index') }}">キャンセル</a> -->
<ul>
    <li>
<form action="{{ route('stocks.index') }}" method="get">
@csrf
<button class="btn-flat-vertical-border" type="submit">キャンセル</button>
</form>
</li>
<li>
<form action="{{ route('stocks.destroy', $stock->id)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn-flat-vertical" type="submit">削除</button>
</form>
</li>
</ul>

</div>

</body>
</html>

@endsection



<!-- "article bg-blue-500 hover:bg-gray-800 text-white rounded px-4 py-2"  -->