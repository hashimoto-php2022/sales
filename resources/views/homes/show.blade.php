@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="sm:w-3/4">
        <h1>会員情報</h1>
        <div class="p-3 rounded-lg mb-10 bg-white ">
            <div class="grid grid-cols-1 sm:gap-y-2 sm:grid-cols-2 w-4/5 items-center">
            <div class="sm:pl-32">名前</div>
            <div class="pl-6">{{$user->name}}</div>
            <div class="sm:pl-32">住所</div>
            <div class="pl-6">{{$user->address}}</div>
            <div class="sm:pl-32">電話番号</div>
            <div class="pl-6">{{$user->tel_number}}</div>
            <div class="sm:pl-32">メールアドレス</div>
            <div class="pl-6">{{$user->email}}</div>
        </div><br>
        <p style="text-align:center">
            <a href = "{{ route('home.edit' , Auth::id()) }}" class="btn-b">編集する</a>
        </p>
    </div>
    <form action="{{ route('home.destroy' , $user->id)}}" method="post" id="delete-form">
        @csrf
        @method('delete')
        <div align="right">
            <button type="submit" class="btn-r"  onclick="deleteBook()">退会</button>
        </div>
    </form>
    <script type="text/javascript">
        function deleteBook(){
            event.preventDefault();
            if (window.confirm('本当に退会しますか?')){
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</div>
@endsection
