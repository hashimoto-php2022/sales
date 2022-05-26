@extends('layouts.app')

@section('content')
    <h1>教科書出品一覧</h1>
    <form action="{{ route('sales.index') }}" method="get">
        <dl class="search">
            <dt>教科書名</dt>
            <dd><input type="text" name="title" id="title" class="w-80" value={{ request('title') }}></dd>
            <dt>著者名</dt>
            <dd><input type="text" name="author" id="author" class="w-80" value={{ request('author') }}></dd>
            <dt>分類</dt>
            <dd><select name="class" id="class">
                <option value="0" selected>全て</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}"
                        @if( $class->id  == request('class')) selected @endif>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select></dd>
            <dt>状態</dt>
            <dd><select name="status" id="status">
                <option value="" >全て</option>
                <option value="未使用" @if("未使用" === request('status')) selected @endif>未使用</option>
                <option value="新品" @if("新品" === request('status')) selected @endif>新品</option>
                <option value="中古" @if("中古" === request('status')) selected @endif>中古</option>
            </select></dd>
        </dl>
        <label for="nozoku">
            <input id="nozoku" type="radio" name="stock" value="1" @if("1" == request('stock')) checked @endif>在庫なしを除く
        </label>
        <label for="hukumu">
            <input id="hukumu" type="radio" name="stock" value="2" @if("2" == request('stock')) checked @endif>在庫なしを含む
        </label>
        <p>
            <button type="submit" class="btn-g">検索</button>
        </p>

    </form>
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
            <td><a href="{{ route('sales.show', $stock->id) }}">{{ $stock->subject->title }}</a></td>
            <td>{{ $stock->subject->author }}</td>
            <td>{{ $stock->price }}</td>
            <td>{{ $stock->status }}</td>
            <td>
                @if( $stock->stock == 1 )
                    <span class="aru">○</span>
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