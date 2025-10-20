@extends('layouts.app')
@section('title', 'Collection')
@section('content')

    <section class="p-5 md:p-8 mt-28 md:mt-32">
        <div class="text-center mb-10">
            <h2 class="text-4xl sm:text-5xl font-extrabold font-serif text-[#574c4a]">Explore My Collection</h2>
            <p class="text-gray-600 text-base sm:text-lg mt-2 max-w-2xl mx-auto">
                A glimpse into my journey — each artwork inspired by the timeless beauty and spirit of Ajanta, reimagined
                through a contemporary lens.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($paintings as $p)
                <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ $p->images && count($p->images) ? asset('storage/' . $p->images[0]) : asset('images/placeholder.jpg') }}"
                        alt="{{ $p->title }}" class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <h3 class="font-semibold text-[#574c4a]">{{ $p->title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ Str::limit($p->description, 80) }}
                        </p>
                        <a href="{{ route('collection.show', $p->slug) }}"
                            class="mt-3 inline-block bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">
                            View Artwork
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No artworks found.</p>
            @endforelse
        </div>
    </section>

@endsection