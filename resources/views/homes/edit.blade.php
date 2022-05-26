@extends('layouts.app')
@section('content')
<div class="flex justify-center">

<form action="{{ route('home.post' , $user->id) }}"method="post" class="w-3/4">
    @csrf
    <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3"> 

        <div class="pl-32">氏名</div>

        <div class= "pl-6 col-span-2">
            <input type="text" name="name" class="w-1/2" value="{{ old('name' , $user->name) }}" >
            @foreach($errors->get('name') as $error)
                    {{ $error }}
                @endforeach
        </div>

        <div class="pl-32">住所</div>
        <div class= "pl-6 col-span-2">
            <input type="text" name="address" class="w-1/2" value="{{ old('address' , $user->address) }}">
            @foreach($errors->get('address') as $error)
                    {{ $error }}
                @endforeach
        </div>

        <div class="pl-32">電話番号</div>
        <div class= "pl-6 col-span-2">
            <input type="text" name="tel_number" class="w-1/2" value="{{ old('tel_number' , $user->tel_number) }}">
            @foreach($errors->get('tel_number') as $error)
                    {{ $error }}
                @endforeach
        </div>

        <div class="pl-32">メールアドレス</div>
        <div class= "pl-6 col-span-2">
            <input type="email" name="email" class="w-1/2" value="{{ old('email' , $user->email) }}">
            @foreach($errors->get('email') as $error)
                    {{ $error }}
                @endforeach
        </div>


<div class="d-flex justify-content-end">

        <button type="submit"class="btn-b">確認画面へ</button>

</div>
</div>

</form>
@endsection
