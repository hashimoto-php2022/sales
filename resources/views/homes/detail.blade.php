@extends('layouts.app')
@section('content')
<h1>購入詳細</h1>
<div class="flex justify-center">
    <div class="w-3/4">
    <div class="p-3 rounded-lg mb-10 bg-white ">
        <div class="container mx-auto grid grid-cols-1 sm:gap-y-2 sm:grid-cols-2 w-4/5 items-center">
            @if(isset($stock->subject->image))
                <div class=""><img src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
            @else
                <div class=""><img src="{{ asset('storage/download.png') }}" alt=""></div>
            @endif
            <div class="grid sm:grid-cols-3">
                <div class="index">教科書名</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->subject->title }}</div>
                <div class="index">著者名</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->subject->author }}</div>            
                <div class="index">分類</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->subject->classification->class_name }}</div>
                <div class="index">値段</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->price }}</div>
                <div class="index">状態</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->status }}</div>
                <div class="index">備考</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->remarks }}</div>
                <div class="index">出品者</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->user->name }}</div>
            </div>
        </div>
        <div align="center" class="mt-5">
            <p>
                <a href="{{ route('home.history', \Auth::id()) }}"><button class="btn-g">購入履歴へ</button></a>
                <a href="{{ route('home.index') }}"><button class="btn-b">マイページへ</button></a>
            </p>
        </div>    
    </div>
</div>
</div>
@endsection