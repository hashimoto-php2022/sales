<form action="{{ route('sales.index') }}" method="get" >
    <table class="">
        <tr>
            <th>教科書名</th>
            <td><input type="text" name="title" id="title" class="sm:w-80" value={{ request('title') }}></td>
        </tr>
        <tr>
            <th>著者名</th>
            <td><input type="text" name="author" id="author" class="sm:w-80" value={{ request('author') }}></td>
        </tr>
        <tr>
            <th>分類</th>
            <td><select name="class" id="class">
                <option value="0" selected>全て</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}"
                        @if( $class->id  == request('class')) selected @endif>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select></td>
        </tr>
        <tr>
            <th>状態</th>
            <td><select name="status" id="status">
                <option value="" >全て</option>
                <option value="未使用" @if("未使用" === request('status')) selected @endif>未使用</option>
                <option value="新品" @if("新品" === request('status')) selected @endif>新品</option>
                <option value="中古" @if("中古" === request('status')) selected @endif>中古</option>
            </select></td>
        </tr>
    </table>
    <div class="radio">
        <label for="nozoku">
            <input id="nozoku" type="radio" name="stock" value="1" @if("1" == request('stock')) checked @endif>在庫なしを除く
        </label>
        <label for="hukumu">
            <input id="hukumu" type="radio" name="stock" value="2" @if("2" == request('stock') || "" == request('stock')) checked @endif>在庫なしを含む
        </label>
    </div>
    <p>
        <button type="submit" class="btn-black mt-5">検索</button>
    </p>
</form>