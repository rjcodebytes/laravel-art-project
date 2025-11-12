@extends('layouts.app')

@section('title', $painting->title . ' - Yashwant Garud')
@section('meta_description', Str::limit(strip_tags($painting->description ?? 'Explore this unique Ajanta-inspired painting by Yashwant Garud.'), 160))
@section('meta_keywords', $painting->tags ?? 'Ajanta art, Indian painting, Yashwant Garud, fine art, cultural art, original paintings')

@section('content')
<section class="md:p-10 mt-28 md:mt-26 overflow-hidden">
    <style>
        /* Button hover */
        .contact-btn {
            background: linear-gradient(135deg, #d4b28c 0%, #c79a6d 100%);
            transition: all 0.3s ease-in-out;
        }
        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(199, 154, 109, 0.4);
        }

        /* ✅ Carousel Core Styles */
        #carousel-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e8ded3;
            border-radius: 10px;
        }

        #carousel {
            display: flex;
            transition: transform 0.6s ease-in-out;
            width: 100%;
        }

        .carousel-img {
            flex: 0 0 100%;
            width: 100%;
            max-width: 100%;
            height: auto;
            max-height: 90vh;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
    </style>

    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-0 md:gap-8 items-start">

            {{-- LEFT: IMAGE CAROUSEL --}}
            <div class="p-6 md:p-0">
                <div class="flex flex-col sm:flex-row items-center sm:items-start justify-center sm:gap-6">

                    {{-- 📸 Thumbnails --}}
                    <div class="hidden sm:flex flex-col gap-3 justify-center items-center">
                        @foreach ($painting->images as $index => $img)
                            <img src="{{ asset('storage/' . $img) }}"
                                class="thumb w-14 h-14 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-gray-400 hover:scale-105 transition-transform duration-300"
                                data-index="{{ $index }}">
                        @endforeach
                    </div>

                    {{-- 🖼️ Main Viewer --}}
                    <div id="carousel-wrapper" class="flex-1 max-w-[700px]">
                        <div id="carousel">
                            @foreach ($painting->images as $img)
                                <img src="{{ asset('storage/' . $img) }}" class="carousel-img rounded-lg" />
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ⚪ Dots (Mobile) --}}
                <div id="dots" class="flex sm:hidden justify-center gap-2 mt-3">
                    @foreach ($painting->images as $index => $img)
                        <div
                            class="dot w-2.5 h-2.5 rounded-full bg-gray-400 transition-all duration-300 {{ $index === 0 ? 'scale-125 bg-gray-800' : '' }}">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT: DETAILS --}}
            <div class="p-6 md:p-8 bg-gray-50 md:rounded-lg self-start h-auto">
                <h1 class="text-2xl font-bold text-[#2f2f2f] mb-2">{{ $painting->title }}</h1>
                <p class="text-gray-600 mb-3 text-justify">{{ $painting->description }}</p>
                <div class="text-gray-500 text-sm mb-4">
                    <span><strong>Medium:</strong> {{ $painting->medium ?? 'Acrylic on Canvas' }}</span> |
                    <span><strong>Size:</strong> {{ $painting->dimensions ?? '24 x 36 in' }}</span>
                </div>
                @if($painting->price)
                    <p class="text-2xl font-semibold text-amber-600 mb-1">₹ {{ number_format($painting->price) }}</p>
                    <p class="text-xs text-gray-500 mb-6">(Inclusive of GST)</p>
                @endif
             <div class="mt-5 fade-up delay-6 flex justify-start"> <a href="{{ route('enquiry.painting', $painting->slug) }}" class="group inline-block bg-[#6b3e26] text-white text-center px-6 py-3 rounded-md font-medium shadow-md transition-all duration-500 relative overflow-hidden hover:bg-[#5a341f]"> <span class="relative z-10 flex items-center justify-center"> Enquire Now <i class="fa-solid fa-arrow-right fa-sm ml-2 transform -translate-x-0 -rotate-45 transition-all duration-300 group-hover:translate-x-1 group-hover:rotate-0 group-active:translate-x-1 group-active:rotate-0"> </i> </span> </a> </div>
            </div>
        </div>
    </div>

    {{-- ✅ Functional Carousel Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carousel = document.getElementById('carousel');
            const images = document.querySelectorAll('.carousel-img');
            const thumbs = document.querySelectorAll('.thumb');
            const dots = document.querySelectorAll('.dot');
            let current = 0;
            let startX = 0, endX = 0;

            function updateCarousel() {
                carousel.style.transform = `translateX(-${current * 100}%)`;
                dots.forEach((d, i) => {
                    d.classList.toggle('bg-gray-800', i === current);
                    d.classList.toggle('bg-gray-400', i !== current);
                    d.classList.toggle('scale-125', i === current);
                });
                thumbs.forEach((t, i) => {
                    t.classList.toggle('border-gray-800', i === current);
                });
            }

            function showImage(index) {
                if (index < 0) index = images.length - 1;
                if (index >= images.length) index = 0;
                current = index;
                updateCarousel();
            }

            thumbs.forEach((t, i) => t.addEventListener('click', () => showImage(i)));
            dots.forEach((d, i) => d.addEventListener('click', () => showImage(i)));

            carousel.addEventListener('touchstart', e => startX = e.touches[0].clientX);
            carousel.addEventListener('touchend', e => {
                endX = e.changedTouches[0].clientX;
                if (Math.abs(startX - endX) > 50) {
                    if (startX > endX) showImage(current + 1);
                    else showImage(current - 1);
                }
            });

            updateCarousel();
        });
    </script>
</section>
@endsection
