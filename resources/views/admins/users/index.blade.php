@extends('layouts.app')
@section('content')


<h1>管理者ページ</h1>
    <p><a href="{{ route('stocks.index') }}">教科書一覧</a> 会員一覧</p>

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
<button type="submit">検索</button>
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
                <td><a href="{{ route('users.show', $user->id) }}">削除</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection