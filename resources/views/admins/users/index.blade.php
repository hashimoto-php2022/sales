@extends('layouts.app')
@section('content')
<style>
        
        li {display:inline-block; margin:5px;}
</style>

<h1>管理者ページ：<span style="color:#D87966">会員一覧</span></h1>
<ul>
    <li>
    <p class="btn-flat-vertical-border"><a href="{{ route('stocks.index') }}">教科書一覧</a></p>
    </li>
    <li>
    <p class="btn-flat-vertical"><a href="{{ route('users.index') }}">会員一覧</a></p>
    </li>
</ul>

<form action="{{ route('users.index') }}" method="get">
    <dl>
        <dt>氏名</dt>
        <dd>
        <input type="text" name="name" value="{{ request('name') }}">
        </dd>
        <dt>住所</dt>
        <dd>
        <input type="text" name="address" value="{{ request('address') }}">
        </dd>
    </dl>
<div align="center">
<button class="btn-g" type="submit">検索</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>氏名</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->tel_number }}</td>
                <td>{{ $user->email }}</td>
                <td style="color:red" ><a href="{{ route('users.show', $user->id) }}">削除</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
</div>



@endsection