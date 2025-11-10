@extends('layouts.app')

@section('title', $post->title . ' - Yashwant Garud')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->description), 150))
@section('meta_keywords', 'art blog, ' . $post->keywords . ', Yashwant Garud')

{{-- 🌟 Open Graph / Social Meta Tags --}}
@section('og_title', $post->title)
@section('og_description', Str::limit(strip_tags($post->excerpt ?? $post->description), 150))
@section('og_image', asset('storage/' . $post->image))
@section('og_type', 'article')
@section('twitter_title', $post->title)
@section('twitter_description', Str::limit(strip_tags($post->excerpt ?? $post->description), 150))
@section('twitter_image', asset('storage/' . $post->image))

@section('content')

    <section id="single-blog" class="max-w-5xl mx-auto px-6 mt-36 md:mt-40 mb-10 relative">
        <div class="mb-4">
            <a href="/my-blogs" class="text-[#564b49] hover:underline mb-4">
                <span class="mr-2"><i class="fa-solid fa-arrow-left"></i></span>Back to Blogs</a>
        </div>
        <article class="bg-white shadow-md rounded-2xl overflow-hidden relative">

            {{-- 🌟 Share Badge Button --}}
            <button id="shareBtn"
                class="absolute top-4 right-4 w-12 h-12 flex items-center justify-center bg-[#564b49] text-white rounded-full shadow-lg hover:bg-[#6c5c59] transition"
                title="Share this post">
                <i class="fa-solid fa-share-nodes text-lg"></i>
            </button>


            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-[400px] object-cover">
            @endif

            <div class="p-6 md:p-10">
                <h1 class="text-4xl font-serif font-bold text-[#564b49] mb-4">{{ $post->title }}</h1>
                <p class="text-gray-500 text-sm mb-6">Published {{ $post->created_at->format('F j, Y') }}</p>

                <div class="prose max-w-none text-gray-800 leading-relaxed">
                    {!! $post->description !!}
                </div>
            </div>
        </article>

        <!-- Recent Posts -->
        @if($recent->count())
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-[#564b49] mb-6">Recent Posts</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recent as $r)
                        <a href="{{ route('blog.show', $r->slug) }}"
                            class="block bg-white rounded-xl shadow hover:shadow-lg transition">
                            <img src="{{ asset('storage/' . $r->image) }}" alt="{{ $r->title }}"
                                class="w-full h-48 object-cover rounded-t-xl">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-[#564b49]">{{ $r->title }}</h3>
                                <p class="text-gray-600 text-sm">{{ Str::limit(strip_tags($r->excerpt ?? $r->description), 80) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    {{-- 💬 Share Button Script --}}
    <script>
        document.getElementById('shareBtn').addEventListener('click', async () => {
            const shareData = {
                title: "{{ $post->title }}",
                text: "Check out this post from Yashwant Garud:",
                url: "{{ url()->current() }}"
            };

            // ✅ Try native share API
            if (navigator.share) {
                try {
                    await navigator.share(shareData);
                } catch (err) {
                    console.log('Share canceled or failed:', err);
                }
            } else {
                // ✅ Fallback modal
                const shareUrl = encodeURIComponent(shareData.url);
                const shareText = encodeURIComponent(shareData.text);

                const fb = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
                const tw = `https://twitter.com/intent/tweet?text=${shareText}&url=${shareUrl}`;
                const wa = `https://api.whatsapp.com/send?text=${shareText}%20${shareUrl}`;

                const shareOptions = `
                            <div id="shareMenu" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
                                <div class="bg-white p-6 rounded-xl shadow-lg text-center max-w-xs">
                                    <h3 class="text-lg font-semibold text-[#564b49] mb-4">Share this post</h3>
                                    <div class="flex justify-center gap-4 mb-4">
                                        <a href="${fb}" target="_blank" class="text-blue-600 text-2xl"><i class="fa-brands fa-facebook"></i></a>
                                        <a href="${tw}" target="_blank" class="text-sky-500 text-2xl"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="${wa}" target="_blank" class="text-green-500 text-2xl"><i class="fa-brands fa-whatsapp"></i></a>
                                    </div>
                                    <button onclick="navigator.clipboard.writeText('${shareData.url}')" class="bg-[#564b49] text-white px-3 py-1 rounded-lg">Copy Link</button>
                                    <button onclick="document.getElementById('shareMenu').remove()" class="mt-3 text-sm text-gray-600 block w-full">Close</button>
                                </div>
                            </div>
                        `;

                document.body.insertAdjacentHTML('beforeend', shareOptions);
            }
        });
    </script>

@endsection