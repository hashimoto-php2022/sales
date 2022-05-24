@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('home.update' , \Auth::id()) }}">
    @method('patch')
@csrf
<label>氏名</label>
<div>
    {{$input["name"]}}
</div>
<label>住所</label>
<div>
    {{ $input["address"]}}
</div>
<label>電話番号</label>
<div>
    {{ $input["tel_number"]}}
</div>
<label>メールアドレス</label>
<div>
    {{ $input["email"]}}
</div>
<a href="{{ route('home.edit' , Auth::id()) }}">戻る</a>
	<input type="submit" value="保存" />
    

</form>
@endsection