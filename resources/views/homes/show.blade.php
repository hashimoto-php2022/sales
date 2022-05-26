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

<form action="{{ route('home.destroy' , $user->id)}}" method="post" id="delete-form">
    @csrf
@method('delete')
<button type="submit" class="btn-r" style="pitition:fixed;left: 860px;px;bottom:10px;" onclick="deleteBook()">退会</button>
</form>
<script type="text/javascript">
    function deleteBook(){
        event.preventDefault();
        if (window.confirm('本当に退会しますか?')){
            document.getElementById('delete-form').submit();
        }
    }
    </script>
@endsection
