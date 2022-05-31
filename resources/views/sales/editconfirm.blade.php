@extends('layouts.app')
@section('content')
    <h1>入力情報確認</h1>
    <div class="flex justify-center">
        <form action="{{ route('sales.update', $stock->id) }}" method="post" class="bg-white rounded-lg p-3">
            @method('patch')
            @csrf
            <div class="grid gap-y-2 grid-cols-1 place-self-center sm:grid-cols-3">
                <div></div>
                    @if(isset($stock->subject->image))
                        <div class="col-span-2" ><img src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
                    @else
                        <div class="col-span-2" ><img src="{{ asset('storage/download.png') }}" alt=""></div>
                    @endif
                <div class="sm:pl-32">教科書名</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->title }}</div>
                <div class="sm:pl-32">著者名</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->author }}</div>
                <div class="sm:pl-32">分類</div>
                <div class="pl-6 col-span-2">{{ $stock->subject->classification->class_name }}</div>
                <div class="sm:pl-32">値段</div>
                <div class="pl-6 col-span-2">{{ $input['price'] }}</div>
                <div class="sm:pl-32">状態</div>
                <div class="pl-6 col-span-2">{{ $input['status'] }}</div>
                <div class="sm:pl-32">備考</div>
                <div class="pl-6 col-span-2">{{ $input['remarks'] }}</div>
            </div>
            <br>
            <p align="center">
                <input name="back" type="submit" formmethod="post" class="btn-b" value="戻る">
                <button type="submit" class="btn-r">登録する</button>
            </p>
        </form>
    </div>
    

    
@endsection