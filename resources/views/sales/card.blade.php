<div class="container px-20">

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 pt-2 pb-10 lg:pb-20 " style="cursor: auto;">
        @foreach ($stocks as $stock)
        <a href="{{ route('sales.show', $stock->id) }}">        
            <div class="card p-6 bg-white rounded-lg border-2 hover:border-blue h-full">
                @if(isset($stock->subject->image))
                    <div class="pb-5 rounded-t-lg" align="center"><img class="h-56" src="{{ asset('storage/' . $stock->subject->image) }}" alt=""></div>
                @else
                    <div class="pb-5 rounded-t-lg" align="center"><img class="h-56" src="{{ asset('storage/download.png') }}" alt=""></div>
                @endif
                        
                <p class="text-lg font-bold">
                    {{ $stock->subject->title }}
                </p>
                
                <p class="">
                    著者：{{ $stock->subject->author }}
                </p>
                <p>
                    状態：{{ $stock->status }}
                </p>
                <div class="place-content-end">
                    <p>
                        <span class="text-xl font-bold text-gray-900">{{ $stock->price }}円</span>
                    </p>
                    <p class="stock">
                        在庫：
                            @if( $stock->stock == 1 )
                                <span class="aru text-right">〇</span>
                            @else
                                <span class="nai text-right">✖</span>
                            @endif
                    </p>
                    <p>出品者：{{ $stock->user->name }}</p>
                </div>          
            </div>
        </a>
      @endforeach      
    </div>
</div>