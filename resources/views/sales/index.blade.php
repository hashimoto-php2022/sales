@extends('layouts.app')
@section('content')
    <h1>教科書出品一覧</h1>
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
    <br>
    @if($stocks->count() !=0)
    <table>
        <tr>
            <th>分類</th>
            <th>教科書名</th>
            <th>著者名</th>
            <th>価格</th>
            <th>状態</th>
            <th>在庫</th>
            <th>出品者</th>
        </tr>

        @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->subject->classification->class_name }}</td>
            <td><a href="{{ route('sales.show', $stock->id) }}" class="show">{{ $stock->subject->title }}</a></td>
            <td>{{ $stock->subject->author }}</td>
            <td>{{ $stock->price }}</td>
            <td>{{ $stock->status }}</td>
            <td>
                @if( $stock->stock == 1 )
                    <span class="aru">〇</span>
                @else
                    <span class="nai">✖</span>
                @endif
            </td>
            <td>{{ $stock->user->name }}</td>
        </tr>
        @endforeach
    </table>
    {{ $stocks->links() }}
    @else
        <p>一致するデータはありませんでした</p>
    @endif
@endsection
