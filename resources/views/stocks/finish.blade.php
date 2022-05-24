@extends('layouts.app')

@section('content')
<div align="center">
    <h1>購入が完了いたしました。</h1>    
    <a href="{{ route('stocks.index') }}"><button class="bg-gray-500 hover:bg-gray-800 text-white rounded px-4 py-2">教科書一覧へ</button></a>
    <p>ありがとうございました</p>
</div>
@endsection