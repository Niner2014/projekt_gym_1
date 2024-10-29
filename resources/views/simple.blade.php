@extends('układ') 

@section('content')
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-3 gap-8 space-y-4 md:space-y-0 mx-4">
    
    @if(count($variable) == 0)
        <p>Nie znaleziono</p>
    @else
        @foreach($variable as $klient)
        <div class="border border-gray-400 rounded p-6" style="background-color: #534f36;"> <!-- Tło ustawione na HEX -->
            <div class="justify-around">
                <img
                    class="hidden w-48 mr-6 md:block"
                    src="{{ asset('images/3.jpg') }}"
                    alt="Zdjęcie {{$klient['imie']}} {{$klient['nazwisko']}}"
                />
                <div>
                    <h3 class="text-2xl text-yellow-500"> <!-- Żółty kolor dla imienia i nazwiska -->
                        <a href="/simple/{{$klient['id']}}">{{$klient['imie']}} {{$klient['nazwisko']}}</a>
                    </h3>
                    <div class="text-lg font-bold mb-4 text-yellow-500"> <!-- Żółty kolor dla statusu -->
                        Status: {{ $klient['aktywny'] ? 'Aktywny' : 'Nieaktywny' }}
                    </div>
                    <ul>
                        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                            <span class="font-bold">Tel.:</span> {{ chunk_split($klient['telefon'], 3, ' ') }}
                        </li>
                        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" style="white-space: nowrap;">
                            <span class="font-bold">Email:</span> {{$klient['email']}}
                        </li>
                    </ul>
                    <div class="text-lg mt-4">
                    </div>
                </div>
            </div>
        </div>
       @endforeach
    @endif
</div>
@endsection