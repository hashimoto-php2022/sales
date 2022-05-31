@extends('layouts.app')
@section('content')
    <h1>入力情報確認</h1>
    <form action="{{ route('sales.store') }}" method="post" class="bg-white rounded-lg p-3">
        @csrf
        <div class="flex justify-center">
            <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3">
                <div class="pl-6 sm:col-span-3" align="center"><img src="{{ $input['image'] }}" alt=""></div>
                <div class="sm:pl-32">教科書名</div>
                <div class="pl-6 sm:col-span-2">{{ $input['title'] }}</div>
                <div class="sm:pl-32">著者名</div>
                <div class="pl-6 sm:col-span-2">{{ $input['author'] }}</div>
                <div class="sm:pl-32">分類</div>
                <div class="pl-6 sm:col-span-2">{{ $class }}</div>
                <div class="sm:pl-32">値段</div>
                <div class="pl-6 sm:col-span-2">{{ $input['price'] }}</div>
                <div class="sm:pl-32">状態</div>
                <div class="pl-6 sm:col-span-2">{{ $input['status'] }}</div>
                <div class="sm:pl-32">備考</div>
                <div class="pl-6 sm:col-span-2">{{ $input['remarks'] }}</div>
            </div>
        </div>
        <br>
        <p align="center">
            <input name="back" type="submit" class="btn-b" value="戻る">      
            <button type="submit" class="btn-r">登録する</button>
        </p>
    </form>
@endsection