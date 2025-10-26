@extends('layouts.app')

@section('title', 'Artist Blog - Yashwant Garud')
@section('meta_description', 'Read the latest blog posts, creative insights, and stories from Yashwant Garud, exploring contemporary artworks, techniques, and inspirations.')
@section('meta_keywords', 'artist blog, art insights, painting techniques, contemporary art, Yashwant Garud')

@section('content')

    <section id="blog-header" class="relative mt-36 md:mt-40 mb-8 bg-[#faf8f5] overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-2 md:mb-10 animate-blog-header">
                <h2 class="text-4xl sm:text-5xl font-extrabold font-serif text-[#564b49] mb-4">
                    Artist Insights & Stories
                </h2>
                <p class="text-lg text-gray-600">
                    Explore the latest blog posts, behind-the-scenes stories, and creative inspirations from the artist.
                </p>
            </div>

            <p class="text-lg text-center text-gray-600">
                Comming Soon . . .
            </p>
        </div>
    </section>

    {{--<section id="blog-posts" class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
        <div
            class="blog-card bg-white shadow-md rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300 animate-blog-post">
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-[#564b49] mb-2">{{ $post->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->excerpt, 100) }}</p>
                <a href="{{ route('blog.show', $post->slug) }}"
                    class="text-[#d4b28c] font-semibold hover:text-[#c19a74] transition">
                    Read More →
                </a>
            </div>
        </div>
        @endforeach
    </section>

    <div class="max-w-7xl mx-auto px-6 py-8">
        {{ $posts->links() }} <!-- Pagination -->
    </div>--}}

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            // Animate blog header
            gsap.from(".animate-blog-header", {
                autoAlpha: 0,
                y: 28,
                duration: 0.9,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".animate-blog-header",
                    start: "top 90%",
                    toggleActions: "play none none reset"
                }
            });

            // Animate blog cards
            gsap.utils.toArray(".animate-blog-post").forEach((el, i) => {
                gsap.fromTo(el,
                    { autoAlpha: 0, y: 40 },
                    {
                        autoAlpha: 1, y: 0, duration: 1, delay: i * 0.1, ease: "power3.out",
                        scrollTrigger: { trigger: el, start: "top 85%", toggleActions: "play none none reverse" }
                    }
                );
            });
        });
    </script>
@endpush