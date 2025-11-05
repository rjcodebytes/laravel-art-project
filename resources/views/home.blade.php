@extends('layouts.app')
@section('title', 'Yashwant Garud - Indian Artist Inspired by Ajanta Art')
@section('meta_description', 'Discover the timeless beauty of Ajanta-inspired paintings by Yashwant Garud. Explore original artworks, exhibitions, and the essence of Indian cultural artistry.')
@section('meta_keywords', 'Yashwant Garud, Ajanta paintings, Indian art, cultural heritage, mural art, traditional paintings, fine art, Ajanta cave art')

@section('content')

    {{-- -<x-loader /> --}}
    <x-hero-slider />
    @include('partials.featured')
    <x-testimonial-slider />

    @include('partials.banner')

@endsection