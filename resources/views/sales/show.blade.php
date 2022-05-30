@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-3/4">
    <h1>教科書詳細</h1>
    <div class="p-3 rounded-lg mb-10 bg-white">
        
        <div class="container mx-auto grid grid-cols-1 sm:gap-y-2 sm:grid-cols-2 w-4/5">
            @if(isset($stock->subject->image))
                <div class="" ><img src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
            @else
                <div class="" ><img src="{{ asset('storage/download.png') }}" alt=""></div>
            @endif
            <div class="grid sm:grid-cols-3">
                <div class=" text-left">教科書名</div>
                <div class="sm:col-span-2 text-left">{{ $stock->subject->title }}</div>
                <div class=" text-left">著者名</div>
                <div class="sm:col-span-2 text-left">{{ $stock->subject->author }}</div>            
                <div class=" text-left">分類</div>
                <div class="sm:col-span-2 text-left">{{ $stock->subject->class_id }}</div>
                <div class=" text-left">値段</div>
                <div class="sm:col-span-2 text-left">{{ $stock->price }}</div>
                <div class=" text-left">状態</div>
                <div class="sm:col-span-2 text-left">{{ $stock->status }}</div>
                <div class=" text-left">在庫</div>
                <div class="sm:col-span-2 text-left">
                    @if( $stock->stock == 1 )
                        <span class="aru">〇</span>
                    @else
                        <span class="nai">✖</span>
                    @endif
                </div>
                <div class=" text-left">備考</div>
                <div class="sm:col-span-2 text-left">{{ $stock->remarks }}</div>
            </div>
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