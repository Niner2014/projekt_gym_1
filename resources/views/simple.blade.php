@extends('układ')

@section('content')
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
    @if(count($variable) == 0)

    <p>Nie znaleziono</p>

    @else

        @foreach($variable as $value)
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <div class="flex">
                <img
                    class="hidden w-48 mr-6 md:block"
                    src="{{asset('images/no-image.png')}}"
                    alt=""
                />
                <div>
                    <h3 class="text-2xl">
                        <a href="show.html">{{$value['tytul']}}</a>
                    </h3>
                    <div class="text-xl font-bold mb-4">{{$value['tytul']}}</div>
                    <ul class="flex">
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="#">Lek</a>
                        </li>
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="#">Na</a>
                        </li>
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="#">Depresje</a>
                        </li>
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="#">Pozdro</a>
                        </li>
                    </ul>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-location-dot"></i> Boston,
                        MA
                    </div>
                </div>
            </div>
        </div>
       @endforeach


    @endif

</div>

@endsection