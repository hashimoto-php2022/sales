@extends('layouts.app')
@section('content')


<h1>管理者ページ</h1>
<p>教科書一覧  <a href="{{ route('users.index') }}">会員一覧</a></p>


<form action="{{ route('stocks.index') }}" method="get">
    <dl>
        <dt>タイトル</dt>
        <dd>
        <input type="text" name="title" value="{{ request('title') }}">
        </dd>
        <dt>著者名</dt>
        <dd>
        <input type="text" name="author" value="{{ request('author') }}">
        </dd>
        <dt>出品者</dt>
        <dd>
        <input type="text" name="name" value="{{ request('name') }}">
        </dd>

    </dl>
<button type="submit">検索</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>タイトル</th>
            <th>著者名</th>
            <th>出品者</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->subject->title }}</td>
            <td>{{ $stock->subject->author }}</td>
            <td>{{ $stock->user->name }}</td>
            <td><a href="{{ route('stocks.show', $stock->id) }}">削除</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table

@endsection