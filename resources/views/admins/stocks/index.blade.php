@extends('layouts.app')
@section('content')
<style>
        
        li {display:inline-block; margin:5px;}
</style>

<h1>管理者ページ：<span style="color:#668AD8">教科書一覧</span></h1>
<ul>
    <li>
    <p class="btn-b"><a href="{{ route('stocks.index') }}">教科書一覧</a></p>
    </li>
    <li>
    <p class="btn-r"><a href="{{ route('users.index') }}">会員一覧</a></p>
    </li>
</ul>

<form action="{{ route('stocks.index') }}" method="get">
    <dl>
        <dt>タイトル</dt>
        <dd>
        <input type="text" name="title" value="{{ request('title') }}">
        </dd>
        <dt>著者名</dt>
        <dd>
        <input type="text" name="author" value="{{ request('author') }}">
        </dd>
        <dt>出品者</dt>
        <dd>
        <input type="text" name="name" value="{{ request('name') }}">
        </dd>

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
<div align="center">
<label for="nozoku">
            <input id="nozoku" type="radio" name="stock" value="1" @if("1" == request('stock')) checked @endif>在庫なしを除く
        </label>
        <label for="hukumu">
            <input id="hukumu" type="radio" name="stock" value="2" @if("2" == request('stock')) checked @endif>在庫なしを含む
        </label>



    <button class="btn-g" type="submit">検索</button>
</form>


<table class="table">
    <thead>
        <tr>
            <th>タイトル</th>
            <th>著者名</th>
            <th>出品者</th>
            <th>分類</th>
            <th>価格</th>
            <th>状態</th>
            <th>在庫</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->subject->title }}</td>
            <td>{{ $stock->subject->author }}</td>
            <td>{{ $stock->user->name }}</td>
            <td>{{ $stock->subject->classification->class_name }}</td>
            <td>{{ $stock->price }}</td>
            <td>{{ $stock->status }}</td>
            <td>
                @if( $stock->stock == 1 )
                    〇
                @else
                    ×
                @endif
            </td>
            <td style="color:red"><a href="{{ route('stocks.show', $stock->id) }}">削除</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $stocks->links() }}
</div>
@endsection