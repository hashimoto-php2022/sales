@extends('layouts.app')
@section('content')
<h1>教科書詳細</h1>
<div class="flex justify-center">
    <div class="sm:w-3/4 w-full">
    <div class="p-3 rounded-lg mb-10 bg-white ">
        <div class="container mx-auto grid grid-cols-1 sm:gap-y-2 sm:grid-cols-2 sm:w-4/5 items-center">
            @if(isset($stock->subject->image))
                <div align="center" class="mb-5"><img src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
            @else
                <div align="center" class="mb-5"><img src="{{ asset('storage/download.png') }}" alt=""></div>
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
                <div class="index">在庫</div>
                <div class="sm:col-span-2 pl-3 border-b">
                    @if( $stock->stock == 1 )
                        <span class="aru">〇</span>
                    @else
                        <span class="nai">✖</span>
                    @endif
                </div>
                <div class="index">備考</div>
                <div class="sm:col-span-2 pl-3 border-b">{{ $stock->remarks }}</div>
            </div>

        </div>
        <div class="flex justify-center">
            <div class="flex flex-col-reverse sm:flex-row">
                <div class="place-self-center">
                    <a href="{{ route('sales.index') }}"><button class="btn-b mt-3 sm:mr-1">教科書一覧へ</button></a>
                </div>
                <div class="place-self-center">
                    @if($stock->user_id === Auth::id())
                        <a href="{{ route('sales.edit', $stock->id) }}"><button class="btn-r mt-3 sm:ml-1">編集</button></a>        
                    @else
                        @if($stock->stock == 1)
                            <a href="{{ route('sales.cart', $stock->id) }}"><button class="btn-r mt-3 sm:ml-1">購入する</button></a>
                        @else
                            <button disabled="disabled" class="bg-gray-300 text-white px-4 py-2 mt-3 sm:ml-1">在庫がありません</button>
                        @endif
                    @endif  
                </div>
            </div>    
        </div>
    </div>

    
</div>
</div>
@endsection