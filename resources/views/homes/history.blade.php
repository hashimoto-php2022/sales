@extends('layouts.app')

@section('content')
    <h1 class="mb-5">購入履歴</h1>
    <table align="center">
        <tr>
            <th>教科書名</th>
            <th>購入日時</th>
        </tr>

        @foreach ($histories as $history)
        <tr>
            <td><a href="{{ route('home.detail', $history->stock_id) }}" class="show">{{ $history->stock->subject->title }}</a></td>
            <td>{{ $history->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection