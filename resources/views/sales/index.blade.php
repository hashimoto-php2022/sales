@extends('layouts.app')

@section('content')
    <h1>教科書出品一覧</h1>
    <form action="{{ route('sales.index') }}" method="get">
        <dl class="search">
            <dt>教科書名</dt>
            <dd><input type="text" name="title" id="title" value={{ request('title') }}></dd>
            <dt>著者名</dt>
            <dd><input type="text" name="author" id="author" value={{ request('author') }}></dd>
            <dt>分類</dt>
            <dd><select name="class" id="class">
                <option value="0" selected>全て</option>
                @foreach($classes as $class)
                    <option value="{{  $class->id }}""
                        @if( $class->id  === request('class')) selected @endif>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select></dd>
            <dt>状態</dt>
            <dd><select name="status" id="status">
                <option value="未使用" @if("未使用" === request('status')) selected @endif>未使用</option>
                <option value="新品" @if("新品" === request('status')) selected @endif>新品</option>
                <option value="中古" @if("中古" === request('status')) selected @endif>中古</option>
            </select></dd>
        </dl>
        <label for="nozoku">
            <input type="radio" name="stock" value="1">在庫なしを除く
        </label>
        <label for="hukumu">
            <input type="radio" name="stock" value="2" checked>在庫なしを含む
        </label>
        <p>
            <button type="submit" class="bg-gray-900 hover:bg-gray-800 text-white rounded px-4 py-2">検索</button>
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
                    有
                @else
                    無
                @endif
            </td>
            <td>{{ $stock->user->name }}</td>
        </tr>
        @endforeach
    </table>
@endsection