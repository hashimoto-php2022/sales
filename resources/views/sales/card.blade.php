<div class="container px-20">
    <div class="grid grid-cols-1 gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 pb-10 lg:pb-20 " style="cursor: auto;">
        @foreach ($stocks as $stock)
        <a href="{{ route('sales.show', $stock->id) }}">        
            <div class="card px-6 py-3 bg-white rounded-lg border-2 hover:border-blue h-full grid grid-cols-1">
                <p>{{ $stock->subject->classification->class_name }}</p>
                @if(isset($stock->subject->image))
                    <div class="pb-5 rounded-t-lg" align="center"><img class="h-64" src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
                @else
                    <div class="pb-5 rounded-t-lg" align="center"><img class="h-64" src="{{ asset('storage/download.png') }}" alt=""></div>
                @endif 
                <p class="text-lg font-bold">
                    {{ $stock->subject->title }}
                </p>
                <p class="">
                    著者：{{ $stock->subject->author }}
                </p>
                <div class="place-content-end">
                    <p class="border-t-2 ">
                        状態：{{ $stock->status }}
                    </p>
                    <p>
                        <span class="text-xl font-bold text-gray-900">{{ $stock->price }}円</span>
                    </p>
                    <p class="float-right text-lg">
                        在庫：
                            @if( $stock->stock == 1 )
                                <span class="aru">〇</span>
                            @else
                                <span class="nai">✖</span>
                            @endif
                    </p>
                    <p>出品者：{{ $stock->user->name }}</p>
                </div>          
            </div>
        </a>
      @endforeach      
    </div>
</div>
