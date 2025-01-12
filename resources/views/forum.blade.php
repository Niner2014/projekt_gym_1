@extends('układ')

@section('content')
@include('partials._hero')

<div class="lg:grid lg:grid-cols-3 gap-8 space-y-4 md:space-y-0 mx-4">
    
    
        
        <form action="{{ route('forum.store') }}" method="POST">
            @csrf
            <label for="message" class="text-white">Wiadomość:</label>
            
            
            <textarea name="message" id="message" class="p-3 rounded mb-4 w-full" style="background-color: #333; color: #fff; border: 1px solid #666; resize: none;" rows="5" required></textarea>
            
            <button type="submit" class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 transition duration-300">Dodaj wiadomość</button>
        </form>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl text-white mb-4">Wiadomości:</h2>

        @foreach($messages as $message)
            <div class="border border-gray-400 rounded p-6 mb-4" style="background-color: #444">
                <p class="text-white"><strong>{{ $message['user_name'] }}</strong> ({{ $message['created_at'] }})</p>
                <p class="text-white">{{ $message['message'] }}</p>
            </div>
        @endforeach
    </div>

</div>
@endsection
