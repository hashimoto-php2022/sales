<table class="tables">
    <thead>
        <tr>
            <th>教科書名</th>
            <th>著者名</th>
            <th>値段</th>
            <th>在庫</th>
</tr>

</thead>
<tbody>
    @foreach($stocks as $stock)
    <tr>
        <td><a href="{{ route('sales.show', $stock->id) }}">{{$stock->subject->title}}</a></td>
        <td>{{$stock->subject->author}}</td>
        <td>{{$stock->price}}</td>
        <td>
            @if( $stock->stock == 1 )
                <span class="aru">〇</span>
            @else
                <span class="nai">✖</span>
            @endif
        </td>
</tr>
@endforeach
</tbody>
</table>

{{$stocks->links()}}
