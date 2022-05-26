@extends('layouts.app')
@section('content')
<style>
        
        li {display:inline-block; margin:5px;}
</style>

<h1>管理者ページ：<span style="color:#668AD8">教科書一覧</span></h1>
<ul>
    <li>
    <p class="btn-flat-vertical-border"><a href="{{ route('stocks.index') }}">教科書一覧</a></p>
    </li>
    <li>
    <p class="btn-flat-vertical"><a href="{{ route('users.index') }}">会員一覧</a></p>
    </li>
</ul>

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

<div align="center">
    <button class="btn-g" type="submit">検索</button>
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
            <td style="color:red"><a href="{{ route('stocks.show', $stock->id) }}">削除</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $stocks->links() }}
</div>
@endsection