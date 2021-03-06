@extends('layouts.app')

@section('content')
    <h1>教科書情報編集</h1>
    <div class="flex justify-center">
        <div class="sm:w-3/4 w-full">
            <form action="{{ route('sales.editPost', $stock->id) }}" method="post" class="bg-white rounded-lg p-3">
                @csrf
                <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3">
                    <div class="sm:pl-32">ISBN番号</div>
                    <div class="pl-6 col-span-2">978-{{ $stock->subject->isbn_code }}</div>
                    <div></div>
                        @if(isset($stock->subject->image))
                            <div class="col-span-2" ><img src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
                        @else
                            <div class="col-span-2" ><img src="{{ asset('storage/download.png') }}" alt=""></div>
                        @endif
                    <div class="sm:pl-32">教科書名</div>
                    <div class="pl-6 col-span-2">{{ $stock->subject->title }}</div>
                    <div class="sm:pl-32">著者名</div>
                    <div class="pl-6 col-span-2">{{ $stock->subject->author }}</div>
                    <div class="sm:pl-32">分類</div>
                    <div class="pl-6 col-span-2">{{ $stock->subject->classification->class_name }}</div>
                    <div class="sm:pl-32">状態</div>
                    <div class="pl-6 col-span-2">
                        <select name="status" id="status" class="sm:w-1/2 border rounded">
                            <option value="未使用" @if("未使用" === old('status', $stock->status)) selected @endif>未使用</option>
                            <option value="新品" @if("新品" === old('tatus', $stock->status)) selected @endif>新品</option>
                            <option value="中古" @if("中古" === old('status', $stock->status)) selected @endif>中古</option>
                        </select>
                    </div>
                    
                    <div class="sm:pl-32">希望売値</div>
                    <div class="pl-6 col-span-2">
                        <input type="text" name="price" id="price" class="sm:w-1/2" value="{{ old('price', $stock->price) }}">
                        @include('commons.error', ['col' => 'price'])
                    </div>
                    <div class="sm:pl-32">備考</div>
                    <div class="pl-6 col-span-2">
                        <textarea name="remarks" id="remarks" class="sm:w-1/2 ">{{ old('remarks', $stock->remarks) }}</textarea>
                    </div>
                </div>
                <p align="center">
                    <button type="submit" class="btn-r">確認画面へ</button>
                </p>
            </form>
        </div>        
    </div>
    <a href="{{ route('sales.show', $stock->id) }}"><button class="btn-b">キャンセル</button></a>
    
@endsection