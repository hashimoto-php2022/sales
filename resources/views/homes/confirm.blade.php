@extends('layouts.app')

@section('content')

<font size="5">確認画面</font>
<br><br>
<form method="POST" action="{{ route('home.update' , \Auth::id()) }}">
    @method('patch')
@csrf
<dl style="text-align:center">
<p class="box1">
<label>氏名</label></p>
<div class="box2">
    {{$input["name"]}}
</div>
<p class="box1">
<label>住所</label></p>
<div class="box2">
    {{ $input["address"]}}
</div>
<p class="box1">
<label>電話番号</label></p>
<div class="box2">
    {{ $input["tel_number"]}}
</div>
<p class="box1">
<label>メールアドレス</label></p>
<div class="box2">
    {{ $input["email"]}}
</div>
</dl><br>

<p  style="text-align:center">
<a href="{{ route('home.edit' , Auth::id()) }}" class="btn-b">戻る</a>

	<input type="submit" class="btn-r"  value="保存"  />
    </p>

</form>
@endsection