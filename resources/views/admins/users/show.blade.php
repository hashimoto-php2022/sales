@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員削除画面</title>
    <style>
        p {font-size:17px; color:red;}
        /* .article { margin:10px; padding:6px 30px;} */
        li {display:inline-block;}
    </style>
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
<div align="center">
<p>このユーザーを削除しますか？</p>

<!-- <a href="{{ route('users.index') }}">キャンセル</a> -->
<!-- <div align="center"> -->


<ul>
    <li>
        <a href="{{ route('users.index') }}"><button class="btn-b">キャンセル</button></a>
{{-- <form action="{{ route('users.index') }}" method="get">
@csrf
<button class="btn-b" type="submit">キャンセル</button>
</form> --}}
    </li>

    <li>
<form action="{{ route('users.destroy', $user->id)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn-r" type="submit">削除</button>
</form> 
    </li>
</ul>
</div>

</body>
</html>

@endsection