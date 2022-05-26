@extends('layouts.app')

@section('content')
<font size="5">会員情報</font>
@csrf
<dl style="text-align:center">
    <dt>名前</dt>
    <dd>{{$user->name}}</dd>
    <dt>住所</dt>
    <dd>{{$user->address}}</dd>
    <dt>電話番号</dt>
    <dd>{{$user->tel_number}}</dd>
    <dt>メールアドレス</dt>
    <dd>{{$user->email}}</dd>
</dl><br>

<p  style="text-align:center">
<a href = "{{ route('home.edit' , Auth::id()) }}" class="btn-b">編集する</a>
</p>

@endsection