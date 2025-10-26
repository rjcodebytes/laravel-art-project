@extends('layouts.app')

@section('content')

    {{-- -<x-loader /> --}}
    <x-hero-slider />
    @include('partials.featured')
    @include('partials.banner')

@endsection