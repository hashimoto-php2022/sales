@extends('layouts.app')

@section('content')
<div align="center">
    <h1>購入が完了いたしました。</h1>    
    <a href="{{ route('sales.index') }}"><button class="btn-b">教科書一覧へ</button></a>
    <p>ありがとうございました</p>
</div>
@endsection