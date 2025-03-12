@extends('base.base')
@section('title', 'Catalog')

@section('content')
    <div class="min-h-screen bg-pink-100 flex flex-col mt-10 pb-5">
        <h1 class="text-4xl font-extrabold text-center text-pink-600 mt-10">Flower Collection</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 px-6">
            @foreach($flowers as $flower)
                <div class="bg-white p-5 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:scale-105">
                    <img src="{{ asset('images/' . $flower['image']) }}" 
                         alt="{{ $flower['name'] }}" 
                         class="w-full h-48 object-cover rounded-lg shadow-md">
                    
                    <h2 class="text-2xl font-bold mt-4 text-pink-500">{{ $flower['name'] }}</h2>
                    <p class="text-gray-700 mt-2">{{ $flower['desc'] }}</p>
                    
                    <a href="/catalog/{{ $flower['id'] }}" 
                       class="inline-block mt-4 px-5 py-2 bg-pink-500 text-white font-semibold rounded-full shadow-md 
                              hover:bg-pink-600 hover:scale-105 transition-transform duration-200">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Footer -->
    @include('includes.footer')
@endsection
