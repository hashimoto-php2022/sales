@extends('layouts.app')
@section('content')
    <h1>入力情報確認</h1>
    <form action="{{ route('sales.update', $stock->id) }}" method="post">
        @method('patch')
        @csrf
        <dl>
            <dt>教科書名</dt>
            <dd>{{ $input['title'] }}</dd>
            <dt>著者名</dt>
            <dd>{{ $input['author'] }}</dd>
            <dt>分類</dt>
            <dd>{{ $class }}</dd>
            <dt>値段</dt>
            <dd>{{ $input['price'] }}</dd>
            <dt>状態</dt>
            <dd>{{ $input['status'] }}</dd>
            <dt>備考</dt>
            <dd>{{ $input['remarks'] }}</dd>
        </dl>
        <p>
            <input name="back" type="submit" formmethod="post" class="bg-gray-500 hover:bg-gray-800 text-white rounded px-4 py-2" value="戻る">
            <button type="submit" class="bg-blue-500 hover:bg-gray-800 text-white rounded px-4 py-2">登録する</button>
        </p>
    </form>

    
@endsection