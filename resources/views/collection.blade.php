@extends('layouts.app')
@section('title', 'Art Collection - Original Ajanta-Inspired Paintings by Yashwant Garud')
@section('meta_description', 'Browse the curated collection of original Ajanta-inspired artworks by Yashwant Garud. Each painting tells a story through color, emotion, and divine inspiration.')
@section('meta_keywords', 'art collection, Ajanta paintings, Indian artist, original artworks, heritage art, mural collection, Yashwant Garud paintings')
@section('content')

    <section class="p-5 md:p-8 mt-28 md:mt-32">
        <div class="text-center mb-10 animate-item animate-headline">
            <h2 class="text-4xl sm:text-5xl font-extrabold font-serif text-[#574c4a]">Explore My Collection</h2>
        </div>

        <!-- Masonry layout -->
        <div id="artGrid" class="columns-2 sm:columns-2 lg:columns-3 gap-6 space-y-6 animate-grid">
            @forelse ($paintings as $p)
                <a href="{{ route('collection.show', $p->slug) }}"
                    class="block break-inside-avoid group overflow-hidden shadow-lg bg-white animate-item transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 focus:outline-none rounded-sm">

                    {{-- IMAGE --}}
                    <img src="{{ $p->images && count($p->images) ? asset('storage/' . $p->images[0]) : asset('images/placeholder.jpg') }}"
                        alt="{{ $p->title }}"
                        class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105" />

                    {{-- CONTENT --}}
                    <div class="p-4 md:p-5 pb-4 grid gap-3">
                        {{-- 🟤 Top Section: Title & Description --}}
                        <div class="grid gap-1">
                            <h3
                                class="font-serif text-lg md:text-xl text-[#2f2f2f] font-semibold leading-snug transition-colors duration-300 group-hover:text-[#7a5e3a]">
                                {{ $p->title }}
                            </h3>
                        </div>

                        {{-- 🟤 Bottom Section: Dimension --}}
                        <div class="mt-1">
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <p class="text-gray-500  mt-1 mb-2">{{ $p->medium }}</p>
                                <span class="text-right ml-4">{{ $p->dimensions ?? '24 x 36 in' }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-4 text-center text-gray-500">No artworks found.</p>
            @endforelse
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const descriptions = document.querySelectorAll('.js-description');

            descriptions.forEach(desc => {
                const fullText = desc.dataset.fulltext?.trim() || '';
                if (!fullText) return;

                // 📱 20 for mobile, 💻 60 for desktop
                const limit = window.innerWidth < 768 ? 20 : 60;
                const truncated = fullText.length > limit ? fullText.substring(0, limit).trim() + '…' : fullText;

                desc.textContent = truncated;
            });
        });
    </script>


@endsection