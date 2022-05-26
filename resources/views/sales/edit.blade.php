@extends('layouts.app')

@section('content')
    <h1>教科書情報編集</h1>
    <form action="{{ route('sales.editPost', $stock->id) }}" method="post">
        @csrf
        <dl>
            <dt>ISBN番号</dt>
            <dd>978-{{ $stock->subject->isbn_code }}</dd>
            <dt>教科書名</dt>
            <dd>{{ $stock->subject->title }}</dd>
            <dt>著者名</dt>
            <dd>{{ $stock->subject->author }}</dd>
            <dt>分類</dt>
            <dd>{{ $stock->subject->classification->class_name }}</dd>
            <dt>状態</dt>
            <dd><select name="status" id="status" class="w-80 border rounded">
                <option value="未使用" @if("未使用" === old('status', $stock->status)) selected @endif>未使用</option>
                <option value="新品" @if("新品" === old('tatus', $stock->status)) selected @endif>新品</option>
                <option value="中古" @if("中古" === old('status', $stock->status)) selected @endif>中古</option>
            </select></dd>
            @include('commons.error', ['col' => 'price'])
            <dt>希望売値</dt>
            <dd><input type="text" name="price" id="price" class="w-80" value="{{ old('price', $stock->price) }}"></dd>
            <dt>備考</dt>
            <dd><textarea name="remarks" id="remarks" class="w-80">{{ old('remarks', $stock->remarks) }}</textarea></dd>
        </dl>
        <p align="center">
            <button type="submit" class="btn-r">確認画面へ</button>
        </p>
    </form>
    <a href="{{ route('sales.show', $stock->id) }}"><button class="btn-b">キャンセル</button></a>
@endsection