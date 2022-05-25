<table class="table">
    <thead>
        <tr>
            <th>タイトル</th>
            <th>著者名</th>
            <th>値段</th>
            <th>在庫</th>
</tr>

</thead>
<tbody>
    @foreach($stocks as $stock)
    <tr>
        <td>{{$stock->subject->title}}</td>
        <td>{{$stock->subject->author}}</td>
        <td>{{$stock->price}}</td>
        <td>{{$stock->stock}}</td>
</tr>
@endforeach
</tbody>
</table>
{{$stocks->links()}}
