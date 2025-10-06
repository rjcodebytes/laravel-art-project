<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', config('app.name', 'Laravel Art Project'))</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

	<!-- Styles / Scripts (Tailwind via Vite) -->
	@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
		@vite(['resources/css/app.css', 'resources/js/app.js'])
	@else
		<style>
			/* Inline Tailwind fallback omitted for brevity.
			   If you need the full fallback, paste your compiled CSS here. */
		</style>
	@endif

	@stack('styles')
</head>
<body class="min-h-screen flex flex-col bg-white text-gray-900">
	@include('partials.navbar')

	<main class="flex-1 py-8">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			@yield('content')
		</div>
	</main>

	@include('partials.footer')

	@stack('scripts')
</body>
</html>
