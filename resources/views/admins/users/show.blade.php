@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員削除画面</title>
</head>
<body>
<dl>
    <dt>氏名</dt>
    <dd>
        {{ $user->name }}
    </dd>

    <dt>住所</dt>
    <dd>
        {{ $user->address }}
    </dd>

    <dt>電話番号</dt>
    <dd>
        {{ $user->tel_number }}
    </dd>

    <dt>メールアドレス</dt>
    <dd>
        {{ $user->email }}
    </dd>
</dl>

<p>このユーザーを削除しますか？</p>

<a href="{{ route('users.index') }}">キャンセル</a>
<form action="{{ route('users.destroy', $user->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">削除</button>
</form> 
</body>
</html>

@endsection