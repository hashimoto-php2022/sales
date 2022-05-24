@extends('layouts.app')

@section('content')
    <h1>教科書出品一覧</h1>
    <form action="{{ route('stocks.index') }}" method="get">
        <dl>
            <dt>教科書名</dt>
            <dd><input type="text" name="title" id="title"></dd>
            <dt>著者名</dt>
            <dd><input type="text" name="author" id="author"></dd>
            <dt>分類</dt>
            <dd><select name="class" id="class">
                <option value=""></option>
            </select></dd>
        </dl>
        <label for="nozoku">
            <input type="radio" name="stock" id="nozoku">在庫なしを除く
        </label>
        <label for="hukumu">
            <input type="radio" name="stock" id="hukumu" checked>在庫なしを含む
        </label>
        <p>
            <button type="submit" class="bg-gray-900 hover:bg-gray-800 text-white rounded px-4 py-2">検索</button>
        </p>
    </form>

    <table>
        <tr>
            <th>
                分類
            </th>
            <th>
                教科書名
            </th>
            <th>
                著者名
            </th>
            <th>
                価格
            </th>
            <th>
                状態
            </th>
            <th>
                出品者
            </th>
        </tr>

        @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->subject->class_id }}</td>
            <td><a href="{{ route('stocks.show', $stock->id) }}">{{ $stock->subject->title }}</a></td>
            <td>{{ $stock->subject->author }}</td>
            <td>{{ $stock->price }}</td>
            <td>{{ $stock->status }}</td>
            <td>{{ $stock->user->name }}</td>
        </tr>
        @endforeach
    </table>
    
@endsection