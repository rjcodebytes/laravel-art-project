@extends('layouts.app')
{{-- 🧠 Dynamic SEO for Painting Detail Page --}}
@section('title', $painting->title . ' - Yashwant Garud')
@section('meta_description', Str::limit(strip_tags($painting->description ?? 'Explore this unique Ajanta-inspired painting by Yashwant Garud.'), 160))
@section('meta_keywords', $painting->tags ?? 'Ajanta art, Indian painting, Yashwant Garud, fine art, cultural art, original paintings')

{{-- 🔗 Open Graph / Social Media Tags --}}
@section('og_title', $painting->title . ' - Yashwant Garud')
@section('og_description', Str::limit(strip_tags($painting->description ?? 'Explore this unique Ajanta-inspired painting by Yashwant Garud.'), 160))
@section('og_type', 'article')
@section('og_image', isset($painting->images[0]) ? asset('storage/' . $painting->images[0]) : asset('logo.webp'))

{{-- 🐦 Twitter Card --}}
@section('twitter_title', $painting->title . ' - Yashwant Garud')
@section('twitter_description', Str::limit(strip_tags($painting->description ?? 'Explore this unique Ajanta-inspired painting by Yashwant Garud.'), 160))
@section('twitter_image', isset($painting->images[0]) ? asset('storage/' . $painting->images[0]) : asset('logo.webp'))

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

    <section class="md:p-10 mt-28 md:mt-26 overflow-hidden">
        <div class="max-w-7xl mx-auto painting-container opacity-0 translate-y-10">
            <div class="grid md:grid-cols-2 gap-0 md:gap-8 items-start">
                {{-- LEFT: IMAGE CAROUSEL --}}
                <div class="p-6 md:p-0">
                    <div class="relative rounded-lg overflow-hidden border border-gray-200">
                        <div id="carousel" class="relative w-full h-[200px] md:h-[500px] overflow-hidden bg-[#e8ded3]">
                            @foreach ($painting->images as $index => $img)
                                <img src="{{ asset('storage/' . $img) }}"
                                    class="carousel-img absolute inset-0 w-full h-full object-contain transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                            @endforeach
                        </div>

                        <button id="prevBtn"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 bg-white/80 text-gray-800 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 shadow-md transition duration-300">
                            &#10094;
                        </button>

                        <button id="nextBtn"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-white/80 text-gray-800 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 shadow-md transition duration-300">
                            &#10095;
                        </button>
                    </div>

                    <div class="flex justify-center gap-3 mt-4">
                        @foreach ($painting->images as $index => $img)
                            <img src="{{ asset('storage/' . $img) }}"
                                class="thumb w-10 h-10 md:w-20 md:h-20 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-gray-400 hover:scale-105 transition-transform duration-300"
                                data-index="{{ $index }}">
                        @endforeach
                    </div>
                </div>

                {{-- RIGHT: DETAILS --}}
                <div class="p-6 md:p-8 bg-gray-50 md:rounded-lg self-start h-auto">
                    {{-- Title --}}
                    <h1 class="text-3xl font-bold text-[#2f2f2f] mb-2 fade-up">{{ $painting->title }}</h1>

                    {{-- Description --}}
                    <p class="text-gray-600 mb-3 fade-up delay-1 text-justify">{{ $painting->description }}</p>

                    {{-- Painting Details Inline --}}
                    <div class="text-gray-500 text-sm mb-4 fade-up delay-2">
                        <span class="mr-2"><strong>Category:</strong>
                            {{ ucfirst($painting->category ?? 'Painting') }}</span> |
                        <span class="mx-2"><strong>Medium:</strong> {{ $painting->medium ?? 'Acrylic on Canvas' }}</span> |
                        <span class="mx-2"><strong>Size:</strong> {{ $painting->dimensions ?? '24 x 36 in' }}</span> 
                        {{-- <span class="ml-2"><strong>Year:</strong> {{ $painting->year_created ?? '-' }}</span> --}}
                    </div>

                    {{-- Price --}}
                    @if($painting->price)
                        <p class="text-2xl font-semibold text-amber-600 mb-1 fade-up delay-3">
                            ₹ {{ number_format($painting->price) }}
                        </p>
                        <p class="text-xs text-gray-500 mb-6 fade-up delay-4">(Inclusive of GST)</p>
                    @endif

                    {{-- Tags --}}
                    @if($painting->tags)
                        <div class="mb-6 fade-up delay-5">
                            <span class="inline-block bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs">
                                Tags: {{ $painting->tags }}
                            </span>
                        </div>
                    @endif

                    {{-- Contact Button --}}
                    <div class="mt-8 fade-up delay-6 flex justify-start">
                        <a href="{{ route('enquiry.painting', $painting->slug) }}"
                            class="contact-btn inline-block text-[#1a1817] text-center px-6 py-3 rounded-md font-medium shadow-md transition-all duration-500 relative overflow-hidden">
                            <span class="relative z-10">Contact Me for Purchase</span>
                        </a>
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