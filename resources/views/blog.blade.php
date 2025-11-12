@extends('layouts.app')

@section('title', 'Artist Blog - Yashwant Garud')
@section('meta_description', 'Read the latest blog posts, creative insights, and stories from Yashwant Garud.')
@section('meta_keywords', 'artist blog, art insights, painting techniques, contemporary art, Yashwant Garud')

@section('content')
 
    <section id="blog-header" class="relative mt-36 md:mt-40 mb-8 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-2 md:mb-10 animate-blog-header">
                <h2 class="text-3xl sm:text-5xl font-extrabold font-serif text-[#564b49] mb-4">
                    Artist Insights & Stories
                </h2>
                <p class="text-md sm:text-lg text-gray-600">
                    Explore the latest blog posts, behind-the-scenes stories, and creative inspirations from the artist.
                </p>
            </div>
        </div>
    </section>

    @php
        $latestPost = $posts->first();
        $featuredPosts = $posts->where('featured', true)->skip(0);
    @endphp

    <section class="max-w-7xl mx-auto px-6 flex justify-center">
        <div class="w-full grid grid-cols-1 lg:grid-cols-[1.6fr_1fr] gap-10 mb-5 items-start">
            @if($latestPost)
                <div class="relative rounded-2xl overflow-hidden group shadow-md hover:shadow-xl transition-all duration-500">
                    <a href="{{ route('blog.show', $latestPost->slug) }}">
                        <img src="{{ asset('storage/' . $latestPost->image) }}" alt="{{ $latestPost->title }}"
                            class="w-full h-[400px] object-cover group-hover:scale-105 group-active:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-center px-6">
                            <h3 class="text-2xl md:text-3xl font-bold text-white leading-tight drop-shadow-lg">
                                {{ $latestPost->title }}
                            </h3>
                        </div>
                    </a>
                </div>
            @endif
            <div class="lg:pl-6">
                <h4
                    class=" text-2xl font-semibold text-[#564b49] mb-4 border-b border-gray-200 pb-2 text-center lg:text-left">
                    Featured Posts
                </h4>
                <div class="flex flex-col space-y-4">
                    @forelse($featuredPosts as $post)
                        <a href="{{ route('blog.show', $post->slug) }}"
                            class="group border-b border-gray-100 pb-3 hover:text-[#d4b28c] transition-colors duration-300 text-justify lg:text-left">
                            <h5 class="text-md md:text-lg font-medium text-gray-800 group-hover:text-[#d4b28c]">
                                {{ $post->title }}
                            </h5>
                        </a>
                    @empty
                        <p class="text-gray-500 text-sm text-center lg:text-left">No featured posts yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-6 my-5">
        <h2 class="text-2xl md:text-3xl font-bold text-[#564b49] mb-8 text-center">
            All Blog Posts
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="w-full h-52 object-cover group-hover:scale-105 group-active:scale-105 transition-transform duration-700">
                        <div class="p-5">
                            <h3
                                class="text-lg md:text-xl font-semibold text-[#564b49] mb-2 group-hover:text-[#d4b28c] transition-colors">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                {{ Str::limit(strip_tags($post->excerpt ?? $post->description), 100) }}
                            </p>
                            <span class="text-[#d4b28c] font-medium hover:text-[#c19a74]">Read More →</span>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full">No blog posts available yet.</p>
            @endforelse
        </div>
    </section>
@endsection