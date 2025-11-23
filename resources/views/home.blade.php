@extends('layouts.app')
@section('title', 'Exclusive Ajanta Paintings by Yashwant Garud')
@section('meta_description', 'Explore exclusive Ajanta paintings hand-painted by Yashwant Garud Discover premium original Ajanta artwork created with mastery detail and heritage View the full collection today.')
@section('meta_keywords', 'Yashwant Garud, Ajanta paintings, Indian art, cultural heritage, mural art, traditional paintings, fine art, Ajanta cave art')

@section('content')

    <x-hero-slider />
    @include('partials.featured')
    <x-testimonial-slider />

    @include('partials.banner')

@endsection