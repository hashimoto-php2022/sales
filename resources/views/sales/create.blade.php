@extends('layouts.app')

@section('content')
    <h1>教科書登録</h1>
    @include('commons.flash')
    
    <form action="{{ route('sales.post') }}" method="post">
        @csrf
        <dl>
            <dt>ISBN番号</dt>
            <dd>
                978-
                <input type="text" name="isbn_code" id="isbn_code" class="w-32" value="{{ old('isbn_code') }}">
                <button id="getBookInfo" class="bg-gray-900 hover:bg-gray-800 text-white rounded px-4 py-2">書籍情報取得</button> 
            </dd>
            <dt>教科書名</dt>
            <dd><input type="text" name="title" id="title" class="w-80" value="{{ old('title') }}"></dd>
            <dt>著者名</dt>
            <dd><input type="text" name="author" id="author" class="w-80" value="{{ old('author') }}"></dd>
            <dt>分類</dt>
            <dd><select name="class" id="class" class="w-80 border rounded">
                @foreach($classes as $class)
                    <option value="{{ $class->id }}"
                        @if( $class->id  === (int)old('class')) selected @endif>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select></dd>
            <dt>状態</dt>
            <dd><select name="status" id="status" class="w-80 border rounded">
                <option value="未使用" @if("未使用" === old('status', $stock->status)) selected @endif>未使用</option>
                <option value="新品" @if("新品" === old('tatus', $stock->status)) selected @endif>新品</option>
                <option value="中古" @if("中古" === old('status', $stock->status)) selected @endif>中古</option>
            </select></dd>
            <dt>希望売値</dt>
            <dd><input type="text" name="price" id="price" class="w-80" value="{{ old('price') }}"></dd>
            <dt>備考</dt>
            <dd><textarea name="remarks" id="remarks" class="w-80">{{ old('remarks') }}</textarea></dd>
        </dl>
        <p align="center">
            <button type="submit" class="bg-blue-500 hover:bg-gray-800 text-white rounded px-4 py-2">確認画面へ</button>
        </p>
    </form>
    <button name="back" type="back" class="bg-gray-300 hover:bg-gray-800 text-white rounded px-4 py-2">戻る</button>

    <script>
        $(function() {
            $('#getBookInfo').click( function( e ) {
                e.preventDefault();
                const isbn = 978+$("#isbn_code").val();
                const url = "https://api.openbd.jp/v1/get?isbn=" + isbn;

                $.getJSON( url, function( data ) {
                    if( data[0] == null ) {
                        alert("データが見つかりません");
                    } else {
                        $("#title").val(data[0].summary.title);
                        // $("#publisher").val(data[0].summary.publisher);
                        // $("#volume").val(data[0].summary.volume);
                        // $("#series").val(data[0].summary.series);
                        let author = data[0].summary.author;
                        let trim = author.split('／');
                        let newAuthor = trim[0]; 

                        $("#author").val(newAuthor);
                        // $("#pubdate").val(data[0].summary.pubdate);
                        // $("#cover").val(data[0].summary.cover);
                        // $("#description").val(data[0].onix.CollateralDetail.TextContent[0].Text);
                    }
                });
            });
        });
    </script>
@endsection