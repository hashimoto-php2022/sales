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
        <input id="hukumu" type="radio" name="stock" value="2" @if("2" == request('stock') || "" == request('stock')) checked @endif>在庫なしを含む
    </label>
    <p>
        <button type="submit" class="btn-black">検索</button>
    </p>
</form>