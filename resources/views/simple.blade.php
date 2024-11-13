@extends('układ') 

@section('content')
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-3 gap-8 space-y-4 md:space-y-0 mx-4">
    
    @if(count($variable) == 0)
        <p>Nie znaleziono</p>
    @else
        @foreach($variable as $klient)
        <div class="border border-gray-400 rounded p-6" style="background-color: #55524a;"> <!-- Tło ustawione na HEX -->
            <div class="justify-center">
                <img src="{{ asset($klient->profilowe ? 'storage/' . $klient->profilowe : 'storage/profile/brak.jpg') }}" 
                alt="Zdjęcie {{ $klient->imie }} {{ $klient->nazwisko }}" 
                class="w-36 h-36 object-cover rounded-full border border-gray-300">
           
                <div>
                    <h3 class="text-2xl text-yellow-500">
                        <a href="/simple/{{ strtolower(str_replace(' ', '-', $klient['imie'])) }}-{{ strtolower(str_replace(' ', '-', $klient['nazwisko'])) }}">
                            {{ $klient['imie'] }} {{ $klient['nazwisko'] }}
                        </a>
                    </h3>  
                    <div class="text-lg font-bold mb-4">
                        <span class="text-yellow-500">Status:</span> 
                        <span class="{{ $klient['aktywny'] ? 'text-green-500' : 'text-red-500' }}">
                            {{ $klient['aktywny'] ? 'Aktywny' : 'Nieaktywny' }}
                        </span>
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