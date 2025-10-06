@extends('layouts.app')

@section('title', 'Home — Art Project')

@section('content')
	<div class="text-center py-12">
		<h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4">Welcome to the Art Project</h1>
		<p class="text-lg text-gray-600 mb-6">A simple Laravel layout with navbar and footer.</p>
		<a href="#" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-indigo-700">Explore the Gallery</a>
	</div>

	<div class="mt-10 grid gap-6 grid-cols-1 md:grid-cols-3">
		<div class="p-6 bg-white border border-gray-100 rounded-lg shadow-sm">
			<h5 class="text-xl font-semibold text-gray-900 mb-2">Feature</h5>
			<p class="text-gray-600">Short description of a feature or artwork.</p>
		</div>
		<div class="p-6 bg-white border border-gray-100 rounded-lg shadow-sm">
			<h5 class="text-xl font-semibold text-gray-900 mb-2">Feature</h5>
			<p class="text-gray-600">Short description of a feature or artwork.</p>
		</div>
		<div class="p-6 bg-white border border-gray-100 rounded-lg shadow-sm">
			<h5 class="text-xl font-semibold text-gray-900 mb-2">Feature</h5>
			<p class="text-gray-600">Short description of a feature or artwork.</p>
		</div>
	</div>
@endsection
