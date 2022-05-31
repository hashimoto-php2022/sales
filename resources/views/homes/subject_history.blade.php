@extends('layouts.app')

@section('content')
    <h1 class="mb-5">登録履歴</h1>
    <table align="center">
        <tr>
            <th>教科書名</th>
            <th>登録日時</th>
        </tr>

        @foreach ($histories as $history)
        <tr>
            <td>{{ $history->subject->title }}</td>
            <td>{{ $history->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection