@extends('layouts.app')

@section('content')
<font size="6">会員情報</font>
@csrf
<dl>
    <dt>名前</dt>
    <dd>{{$user->name}}</dd>
    <dt>住所</dt>
    <dd>{{$user->address}}</dd>
    <dt>電話番号</dt>
    <dd>{{$user->tel_number}}</dd>
    <dt>メールアドレス</dt>
    <dd>{{$user->e_mail}}</dd>
</dl>

<a href = "{{ route('home.edit' , $user) }}">編集するンゴね</a>

@endsection