@extends('base.base')
@section('title', $flower['name'])

@section('content')
    <div class="flex flex-col min-h-screen mt-10 bg-pink-100">
        <div class="flex-grow flex justify-center items-center mt-15"> 
            <div class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl w-full text-center">
                <img src="{{ asset('images/' . $flower['image']) }}" 
                     alt="{{ $flower['name'] }}" 
                     class="w-full h-64 object-cover rounded-lg shadow-md">
                
                <h1 class="text-4xl font-extrabold mt-6 text-pink-600">{{ $flower['name'] }}</h1>
                <h5 class="text-xl mt-2 text-pink-500">Rp {{ $flower['price'] }}</h5>
                <p class="mt-3 text-gray-700 text-lg">{{ $flower['detail'] }}</p>
                
                <a href="/catalog" 
                   class="inline-block mt-6 px-6 py-3 bg-pink-500 text-white font-semibold rounded-full shadow-md 
                          hover:bg-pink-600 hover:scale-105 transition-transform duration-200">
                    Back to Catalog
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-10">
            @include('includes.footer')
        </div>
    </div>
@endsection
