@extends('layouts.app')
@section('content')
    <h1>入力情報確認</h1>
    <form action="{{ route('sales.update', $stock->id) }}" method="post">
        @method('patch')
        @csrf
        <dl>
            <dt>教科書名</dt>
            <dd>{{ $stock->subject->title }}</dd>
            <dt>著者名</dt>
            <dd>{{ $stock->subject->author }}</dd>
            <dt>分類</dt>
            <dd>{{ $stock->subject->classification->class_name }}</dd>
            <dt>値段</dt>
            <dd>{{ $input['price'] }}</dd>
            <dt>状態</dt>
            <dd>{{ $input['status'] }}</dd>
            <dt>備考</dt>
            <dd>{{ $input['remarks'] }}</dd>
        </dl>
        <p align="center">
            <input name="back" type="submit" formmethod="post" class="btn-b" value="戻る">
            <button type="submit" class="btn-r">登録する</button>
        </p>
    </form>

    
@endsection