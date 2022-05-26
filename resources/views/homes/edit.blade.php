@extends('layouts.app')
@section('content')

<form action="{{ route('home.post' , $user->id) }}"method="post">
    
    @csrf
    <dl>
        <dt>氏名</dt>

        <dd>
            <input type="text" name="name" value="{{ old('name' , $user->name) }}">
        </dd>
        @foreach($errors->get('name') as $error)
                    {{ $error }}
                @endforeach

        <dt>住所</dt>
        <dd>
            <input type="text" name="address" value="{{ old('address' , $user->address) }}">
        </dd>
        @foreach($errors->get('address') as $error)
                    {{ $error }}
                @endforeach
            <dt>電話番号</dt>
        <dd>
            <input type="text" name="tel_number" value="{{ old('tel_number' , $user->tel_number) }}">
        </dd>
        @foreach($errors->get('tel_number') as $error)
                    {{ $error }}
                @endforeach
        <dt>メールアドレス</dt>
        <dd>
            <input type="email" name="email" value="{{ old('email' , $user->email) }}">
</dd>
@foreach($errors->get('email') as $error)
                    {{ $error }}
                @endforeach

<div class="d-flex justify-content-end">

        <button type="submit"class="btn-b">更新</button>
</div>
    </dl>

</form>
@endsection
