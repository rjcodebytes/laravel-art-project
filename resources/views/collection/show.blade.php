@extends('layouts.app')
@section('title', $painting->title)

@section('content')
    <style>
        /* Gradient Button */
        .contact-btn {
            background: linear-gradient(135deg, #d4b28c 0%, #c79a6d 100%);
            position: relative;
            transition: all 0.4s ease-in-out;
        }

        .contact-btn::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #c79a6d 0%, #d4b28c 100%);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            z-index: 0;
        }

        .contact-btn:hover::before {
            opacity: 1;
        }

        .contact-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 20px rgba(212, 178, 140, 0.4);
        }
    </style>

    {{-- GSAP CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <section class=" md:p-10 mt-24 md:mt-32 bg-gray-50 min-h-screen overflow-hidden">
        <div class="max-w-7xl mx-auto overflow-hidden painting-container opacity-0 translate-y-10">
            <div class="grid md:grid-cols-2 gap-8 items-start">

                {{-- LEFT: IMAGE CAROUSEL --}}
                <div class="p-6">
                    <div class="relative rounded-lg overflow-hidden border border-gray-200">
                        <div id="carousel" class="relative w-full h-[500px] overflow-hidden bg-gray-100">
                            @foreach ($painting->images as $index => $img)
                                <img src="{{ asset('storage/' . $img) }}"
                                    class="carousel-img absolute inset-0 w-full h-full object-contain bg-white transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                            @endforeach
                        </div>

                        {{-- Carousel Controls --}}
                        <button id="prevBtn"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 bg-white/80 text-gray-800 p-2 rounded-full hover:bg-gray-100 shadow-md transition duration-300">
                            &#10094;
                        </button>
                        <button id="nextBtn"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-white/80 text-gray-800 p-2 rounded-full hover:bg-gray-100 shadow-md transition duration-300">
                            &#10095;
                        </button>
                    </div>

                    {{-- Thumbnails --}}
                    <div class="flex justify-center gap-3 mt-4">
                        @foreach ($painting->images as $index => $img)
                            <img src="{{ asset('storage/' . $img) }}"
                                class="thumb w-20 h-20 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-gray-400 hover:scale-105 transition-transform duration-300"
                                data-index="{{ $index }}">
                        @endforeach
                    </div>
                </div>

                {{-- RIGHT: DETAILS --}}
                <div class="p-6 md:p-8">
                    <h1 class="text-3xl font-bold text-[#2f2f2f] mb-2 fade-up">{{ $painting->title }}</h1>
                    <p class="text-gray-600 mb-2 fade-up delay-1">{{ $painting->description }}</p>

                    <p class="text-gray-500 mb-3 text-sm fade-up delay-2">
                        {{ ucfirst($painting->category ?? 'Painting') }} |
                        {{ $painting->medium ?? 'Oil on Canvas' }}
                    </p>

                    {{-- Price --}}
                    @if($painting->price)
                        <p class="text-2xl font-semibold text-amber-600 mb-1 fade-up delay-3">
                            ₹ {{ number_format($painting->price) }}
                        </p>
                        <p class="text-xs text-gray-500 mb-4 fade-up delay-4">(Inclusive of GST)</p>
                    @endif

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 mb-8 fade-up delay-5">
                        <a href="{{ route('enquiry.painting', $painting->slug) }}"
                            class="contact-btn flex-1 inline-block text-[#1a1817] text-center px-6 py-3 rounded-md font-medium shadow-md transition-all duration-500 relative overflow-hidden">
                            <span class="relative z-10">Contact Me for Purchase</span>
                        </a>
                    </div>


                    {{-- Details of Work --}}
                    <div class="fade-up delay-6">
                        <h3 class="text-lg font-semibold mb-3 border-b border-gray-200 pb-2">Details of the Work</h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li><strong>Size:</strong> {{ $painting->dimensions ?? '24 x 36 in' }}</li>
                            <li><strong>Category:</strong> {{ $painting->category ?? 'Painting' }}</li>
                            <li><strong>Medium:</strong> {{ $painting->medium ?? 'Acrylic on Canvas' }}</li>
                            <li><strong>Year:</strong> {{ $painting->year_created ?? '-' }}</li>
                        </ul>

                        {{-- Tag --}}
                        @if($painting->tags)
                            <div class="mt-5">
                                <span class="inline-block bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs">
                                    Tags: {{ $painting->tags }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Carousel + GSAP Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.carousel-img');
            const thumbs = document.querySelectorAll('.thumb');
            let current = 0;

            const showImage = (index) => {
                gsap.to(images[current], { opacity: 0, duration: 0.1, ease: "power2.out" });
                gsap.to(images[index], { opacity: 1, duration: 0.1, ease: "power2.in" });
                thumbs.forEach((t, i) => t.classList.toggle('border-gray-800', i === index));
                current = index;
            };

            document.getElementById('prevBtn').addEventListener('click', () => {
                showImage((current - 1 + images.length) % images.length);
            });

            document.getElementById('nextBtn').addEventListener('click', () => {
                showImage((current + 1) % images.length);
            });

            thumbs.forEach(t => {
                t.addEventListener('click', () => {
                    showImage(parseInt(t.dataset.index));
                });
            });

            showImage(0);

            // Page animations
            gsap.registerPlugin(ScrollTrigger);

            gsap.to('.painting-container', {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: 'power3.out'
            });

            gsap.utils.toArray('.fade-up').forEach((el, i) => {
                gsap.from(el, {
                    scrollTrigger: el,
                    opacity: 0,
                    y: 30,
                    duration: 1,
                    delay: i * 0.1,
                    ease: 'power2.out'
                });
            });
        });
    </script>
@endsection