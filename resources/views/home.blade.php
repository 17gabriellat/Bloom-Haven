@extends('base.base')
@section('title', 'Home')

@section('content')
    <main class="relative w-full h-screen flex flex-col overflow-hidden"> 
        
        <!-- Slideshow Container -->
        <div id="carousel-container" class="relative flex-grow w-full overflow-hidden mt-16"> 
            <div id="carousel" class="absolute inset-0 w-full h-full">
                @if(isset($flowers) && count($flowers) > 0)
                    @foreach($flowers as $flower)
                        <img src="{{ asset('images/' . $flower['image']) }}" 
                            class="absolute inset-0 w-full h-full object-cover hidden" 
                            alt="{{ $flower['name'] }}">
                    @endforeach
                @else
                    <p class="text-white text-center flex items-center justify-center w-full h-full">
                        No flowers available.
                    </p>
                @endif
            </div>
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center bg-black/80">
            <h1 class="text-5xl font-extrabold">Welcome to Bloom Haven</h1>
            <p class="mt-3 text-xl">Discover the beauty of fresh flowers for every occasion!</p>
            <p class="mt-3 text-sm pb-4 text-pink-500">By Maria Gabriella Tjung - C14230085</p>
            <button onclick="window.location.href='/catalog'" 
                    class="px-6 py-2 bg-pink-500 text-white text-lg font-semibold rounded-full shadow-md 
                           transition transform hover:scale-105 hover:bg-pink-600 active:scale-95">
                See the Catalog
            </button>
        </div>

        <!-- Footer -->
         <div class="fixed bottom-0 left-0 w-full">
            @include('includes.footer')
         </div>

        <!-- Navigasi Slideshow -->
        @if(isset($flowers) && count($flowers) > 1)
            <button id="prevBtn" class="absolute left-5 top-1/2 -translate-y-1/2 bg-white text-pink-500 px-4 py-2 rounded-full shadow-lg opacity-90 hover:opacity-100 hover:scale-110 transition-transform"><b><</b></button>
            <button id="nextBtn" class="absolute right-5 top-1/2 -translate-y-1/2 bg-white text-pink-500 px-4 py-2 rounded-full shadow-lg opacity-90 hover:opacity-100 hover:scale-110 transition-transform"><b>></b></button>
        @endif
    </main>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            let currentIndex = 0;
            const $slides = $("#carousel img");
            const totalSlides = $slides.length;
            let autoSlideInterval;

            if (totalSlides > 0) {
                $slides.eq(0).fadeIn();

                function showSlide(index) {
                    currentIndex = (index + totalSlides) % totalSlides;
                    $slides.fadeOut(500);
                    $slides.eq(currentIndex).fadeIn(500);
                }

                function nextSlide() { showSlide(currentIndex + 1); }
                function prevSlide() { showSlide(currentIndex - 1); }

                function startAutoSlide() {
                    clearInterval(autoSlideInterval);
                    autoSlideInterval = setInterval(nextSlide, 5000);
                }

                $("#nextBtn").on("click", function () {
                    nextSlide();
                    startAutoSlide();
                });

                $("#prevBtn").on("click", function () {
                    prevSlide();
                    startAutoSlide();
                });

                startAutoSlide();
            }
        });
    </script>
@endsection
