@extends('layouts.app')

@section('content')
    @if($stock->user_id == \Auth::id())
        <br>
        <p>自分で出品した教科書は購入できません。</p>
    @elseif($stock->stock == 0)
        <br>
        <p>在庫がありません。</p>
    @else
        <h1>この教科書を購入します。よろしいですか？</h1>
        <div  class="flex justify-center">
            <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3">
                <div class="pl-32">教科書名</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->title }}</div>
                <div class="pl-32">著者名</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->author }}</div>
                <div class="pl-32">分類</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->class_id }}</div>
                <div class="pl-32">値段</div>
                <div class="pl-6 col-span-2">{{ $stock->price }}</div>
                <div class="pl-32">状態</div>
                <div class="pl-6 col-span-2">{{ $stock->status }}</div>
            </div>
        </div>
        <form action="{{ route('sales.buy', $stock->id) }}" method="post">
            @csrf
            <div align="center">
                <button type="submit" class="btn-r">購入する</button>
            </div>
        </form>
        <a href="{{ route('sales.show', $stock->id) }}"><button class="btn-b">キャンセル</button></a>
    @endif    
@endsection