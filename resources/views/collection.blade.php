@extends('layouts.app')
@section('title', 'Collection')
@section('content')

    <section class="p-5 md:p-8 mt-28 md:mt-32">
        <div class="text-center mb-10 animate-item animate-headline">
            <h2 class="text-4xl sm:text-5xl font-extrabold font-serif text-[#574c4a]">Explore My Collection</h2>
            <p class="text-gray-600 text-base sm:text-lg mt-2 max-w-2xl mx-auto">
                A glimpse into my journey — each artwork inspired by the timeless beauty and spirit of Ajanta, reimagined
                through a contemporary lens.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 animate-grid">
            @forelse ($paintings as $p)
                {{-- inside your grid loop --}}
                <div class="relative group rounded-2xl overflow-hidden shadow-lg animate-item">
                    {{-- IMAGE --}}
                    <img src="{{ $p->images && count($p->images) ? asset('storage/' . $p->images[0]) : asset('images/placeholder.jpg') }}"
                        alt="{{ $p->title }}"
                        class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-105 group-active:scale-105 group-hover:brightness-90 group-active:brightness-90" />

                    {{-- OVERLAY: Hidden by default, slides up on hover --}}
                    <div class="absolute left-6 right-6 bottom-0 mb-5">
                        <div class="relative overflow-hidden rounded-xl">

                            {{-- Glass overlay container (always blurred) --}}
                            <div class="bg-white/60 backdrop-blur-md border-2 border-white rounded-xl shadow-md
                            p-5 md:p-6
                            transition-all duration-500 ease-out
                            opacity-0 translate-y-5 group-hover:opacity-100 group-active:opacity-100 group-hover:shadow-2xl group-active:shadow-2xl group-hover:translate-y-0 group-active:translate-y-0
                            will-change-transform will-change-opacity"
                                style="backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius:12px;">

                                {{-- CONTENT ROW --}}
                                <div
                                    class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                    {{-- LEFT SIDE --}}
                                    <div class="flex-1">
                                        <h3 class="font-serif text-2xl text-[#2f2f2f] font-semibold leading-snug">
                                            {{ $p->title }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1 line-clamp-2">
                                            {{ Str::limit($p->description, 100) ?? 'Beautiful hand-painted artwork on canvas.' }}
                                        </p>

                                        <p class="text-sm text-gray-600 mt-2">
                                            {{ $p->dimension ?? '24 x 36 in' }}
                                        </p>
                                    </div>

                                    {{-- RIGHT SIDE --}}
                                    <div class="shrink-0">
                                        <a href="{{ route('collection.show', $p->slug) }}"
                                            class="inline-block px-5 py-2 bg-[#d4b28c] hover:bg-[#c19a74] text-black text-sm rounded-md  transition">
                                            View Art
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            @empty
                <p class="col-span-4 text-center text-gray-500">No artworks found.</p>
            @endforelse
        </div>
    </section>

    <!-- GSAP + ScrollTrigger: animate headline and grid items -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof gsap === 'undefined') return;
        gsap.registerPlugin(ScrollTrigger);

        // reveal headline
        gsap.from('.animate-headline', {
            autoAlpha: 0,
            y: 30,
            duration: 0.9,
            ease: 'power3.out',
            scrollTrigger: { trigger: '.animate-headline', start: 'top 90%' }
        });

        // stagger grid items
        const items = gsap.utils.toArray('.animate-grid .animate-item');
        gsap.from(items, {
            autoAlpha: 0,
            y: 28,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.animate-grid',
                start: 'top 90%',
                end: 'bottom 60%',
                scrub: false
            }
        });

        // refresh after images load
        window.addEventListener('load', () => ScrollTrigger.refresh());
    });
    </script>
@endsection