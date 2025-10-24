@extends('layouts.app')

@section('content')
    <x-loader />
    <x-carousel />
    @include('partials.featured')
    @include('partials.banner')

@endsection