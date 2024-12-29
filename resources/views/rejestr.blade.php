@extends('układ')

@section('content')
@include('partials._hero')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-semibold text-center text-yellow-500 mb-6">Dostępne pliki PDF</h1>

    @if($documents->isEmpty())
        <p>Brak dostępnych plików PDF.</p>
    @else
        <ul class="list-none space-y-4">
            @foreach($documents as $document)
                <li class="bg-white p-4 rounded-md shadow-md hover:bg-gray-100 transition">
                    <div class="flex items-center justify-between">
                        <div class="text-lg font-medium">
                            <a href="{{ asset('storage/' . $document->pdf_path) }}" class="text-blue-500 hover:underline" target="_blank">
                                {{ basename($document->pdf_path) }}
                            </a>
                        </div>
                        <div class="text-sm text-gray-500">
                            Dodano: {{ \Carbon\Carbon::parse($document->created_at)->format('d-m-Y H:i') }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
