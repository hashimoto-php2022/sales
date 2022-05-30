@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-3/4">
    <h1>教科書詳細</h1>
    <div class="p-3 rounded-lg mb-10 bg-white">
        <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3">
            <div class="pl-32">教科書名</div>
            <div class="px-6 col-span-2">{{ $stock->subject->title }}</div>
            <div class="pl-32">著者名</div>
            <div class="px-6 col-span-2">{{ $stock->subject->author }}</div>
            <div class="pl-32">画像プレビュー</div>
            <div class="pl-6 col-span-2"><img src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
            <div class="pl-32">分類</div>
            <div class="px-6 col-span-2">{{ $stock->subject->class_id }}</div>
            <div class="pl-32">値段</div>
            <div class="px-6 col-span-2">{{ $stock->price }}</div>
            <div class="pl-32">状態</div>
            <div class="px-6 col-span-2">{{ $stock->status }}</div>
            <div class="pl-32">在庫</div>
            <div class="px-6 col-span-2">
                @if( $stock->stock == 1 )
                    <span class="aru">〇</span>
                @else
                    <span class="nai">✖</span>
                @endif
            </div>
            <div class="pl-32">備考</div>
            <div class="px-6 col-span-2">{{ $stock->remarks }}</div>
        </div>
        <div align="center" class="mt-5">
            <p>
                <a href="{{ route('sales.index') }}"><button class="btn-b">教科書一覧へ</button></a>
                @if($stock->user_id === Auth::id())
                    <a href="{{ route('sales.edit', $stock->id) }}"><button class="btn-r">編集</button></a>        
                @else
                    @if($stock->stock == 1)
                        <a href="{{ route('sales.cart', $stock->id) }}"><button class="btn-r">購入する</button></a>
                    @else
                        <button disabled="disabled" class="bg-gray-300 text-white px-4 py-2">在庫がありません</button>
                    @endif
                @endif  
            </p>
        </div>    
    </div>

    
</div>
</div>
@endsection