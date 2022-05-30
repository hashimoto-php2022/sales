@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="">
    <h1>条件の指定</h1>
    <div id="form" class="p-3 rounded-lg">
        @include('commons.stockform')
        <p>
            <button onclick="reset()">検索条件をリセットする</button>
            <script type="text/javascript">
                function reset() {
                    var url = new URL(window.location.href);
                    var params = url.searchParams;
                    history.replaceState('', '', url.pathname);
                    location.reload()
                }
            </script>
        </p>
    </div>
    @if($stocks->count() !=0)
    <h1 class="mt-5">出品一覧</h1>
    @include('sales.card')
    {{ $stocks->links() }}
    @else
        <p>一致するデータはありませんでした</p>
    @endif
</div>
</div>
    
@endsection