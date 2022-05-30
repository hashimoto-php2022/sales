@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-3/4">
    <h1>教科書登録</h1>
        <form action="{{ route('sales.post') }}" method="post" enctype='multipart/form-data' id="create" class="bg-white rounded-lg p-3">
            @csrf
            <div class="grid gap-y-2 grid-cols-1 items-center sm:grid-cols-3">
                <div class="index ml-32">ISBN番号</div>
                <div class="pl-6 col-span-2">
                    978-
                    <input type="text" name="isbn_code" id="isbn_code" class="w-1/3" value="{{ old('isbn_code') }}">
                    <button id="getBookInfo" class="btn-black">書籍情報取得</button>
                    <p>@include('commons.error', ['col' => 'isbn_code'])</p> 
                </div>

                <div class="index pl-32">画像プレビュー</div>
                <div class="px-6 col-span-2">
                    {{-- <input type="file" name="image" id="previewImage" accept='image/*'/> --}}
                    <img id="preview" name="image" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;"> 
                    <input type="hidden" id="image" name="image" value="{{ old('image') }}">                
                </div>
            

                <div class="index pl-32">教科書名</div>
                <div class="px-6 col-span-2">
                    <input type="text" name="title" id="title" class="w-1/2" value="{{ old('title') }}">
                    @include('commons.error', ['col' => 'title'])
                </div>

                <div class="index pl-32">著者名</div>
                <div class="px-6 col-span-2">
                    <input type="text" name="author" id="author" class="w-1/2" value="{{ old('author') }}">
                    @include('commons.error', ['col' => 'author'])
                </div>
                
                <div class="index pl-32">分類</div>
                <div class="px-6 col-span-2">
                    <select name="class" id="class" class="border rounded w-1/2">
                        <option value="" disabled selected>選択して下さい</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}"
                                @if( $class->id  === (int)old('class')) selected @endif>
                                {{ $class->class_name }}
                            </option>
                        @endforeach
                    </select>
                    @include('commons.error', ['col' => 'class'])
                </div>

                <div class="index pl-32">状態</div>
                <div class="px-6 col-span-2">
                    <select name="status" id="status" class="border rounded w-1/2">
                        <option value="" disabled selected>選択して下さい</option>
                        <option value="未使用" @if("未使用" === old('status', $stock->status)) selected @endif>未使用</option>
                        <option value="新品" @if("新品" === old('tatus', $stock->status)) selected @endif>新品</option>
                        <option value="中古" @if("中古" === old('status', $stock->status)) selected @endif>中古</option>
                    </select>
                    @include('commons.error', ['col' => 'status'])
                </div>

                <div class="index pl-32">希望売値</div>
                <div class="px-6 col-span-2">
                    <input type="text" name="price" id="price" class="w-1/3" value="{{ old('price') }}">円
                    @include('commons.error', ['col' => 'price'])
                </div>

                <div class="index pl-32">備考</div>
                <div class="px-6 col-span-2">
                    <textarea name="remarks" id="remarks" class="w-1/2">{{ old('remarks') }}</textarea>
                </div>
            </div>
            <p align="center">
                
                <button type="submit" class="btn-r">確認画面へ</button>
            </p>
        </form>
        <a href="{{ route('sales.index') }}"><button class="btn-b mt-5">一覧へ</button></a>
    </div>
</div>
    
    

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
                        if( data[0].summary.cover == "" ){
                            //$("#preview").html('<img src=\"\" />');
                        } else {
                            // $("#preview").html('<img src=\"' + data[0].summary.cover + '\" style=\"border:solid 1px #000000\" />');
                            $("#preview").attr('src', data[0].summary.cover);
                        }
                        console.log(data[0].summary.cover);
                        $("#title").val(data[0].summary.title);
                        // $("#publisher").val(data[0].summary.publisher);
                        // $("#volume").val(data[0].summary.volume);
                        // $("#series").val(data[0].summary.series);
                        let author = data[0].summary.author;
                        let trim = author.split('／');
                        let newAuthor = trim[0]; 
                        $("#author").val(newAuthor);
                        // $("#pubdate").val(data[0].summary.pubdate);
                        $("#image").val(data[0].summary.cover);
                        // $("#description").val(data[0].onix.CollateralDetail.TextContent[0].Text);
                    }
                });
            });
            $('#previewImage').change(function( e ) {
                let reader = new FileReader();
	            reader.onload = (function() {
                    //id=previewのsrc属性を追加
		            $("#preview").attr('src', e.target.result);
	            });
	            reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection