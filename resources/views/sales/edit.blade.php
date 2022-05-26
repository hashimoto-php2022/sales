@extends('layouts.app')

@section('content')
    <h1>教科書情報編集</h1>
    <div class="flex justify-center">
        <form action="{{ route('sales.editPost', $stock->id) }}" method="post" class="w-3/4">
            @csrf
            <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3">
                <div class="pl-32">ISBN番号</div>
                <div class="pl-6 col-span-2">978-{{ $stock->subject->isbn_code }}</div>
                <div class="pl-32">教科書名</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->title }}</div>
                <div class="pl-32">著者名</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->author }}</div>
                <div class="pl-32">分類</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->classification->class_name }}</div>
                <div class="pl-32">状態</div>
                <div class="pl-6 col-span-2"><select name="status" id="status" class="w-80 border rounded">
                    <option value="未使用" @if("未使用" === old('status', $stock->status)) selected @endif>未使用</option>
                    <option value="新品" @if("新品" === old('tatus', $stock->status)) selected @endif>新品</option>
                    <option value="中古" @if("中古" === old('status', $stock->status)) selected @endif>中古</option>
                </select></div>
                @include('commons.error', ['col' => 'price'])
                <div class="pl-32">希望売値</div>
                <div><input type="text" name="price" id="price" class="w-80" value="{{ old('price', $stock->price) }}"></div>
                <div class="pl-32">備考</div>
                <div><textarea name="remarks" id="remarks" class="w-80">{{ old('remarks', $stock->remarks) }}</textarea></div>
            </div>
            <p align="center">
                <button type="submit" class="btn-r">確認画面へ</button>
            </p>
        </form>
        <a href="{{ route('sales.show', $stock->id) }}"><button class="btn-b">キャンセル</button></a>
    </div>
    
@endsection