<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', config('app.name', 'Laravel Art Project'))</title>
	
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
	<script src="https://kit.fontawesome.com/e37f90b971.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen flex flex-col bg-[#faf8f5] text-gray-900 ">
	@include('partials.navbar')

	<main class="flex-1 ">
		<div>
			@yield('content')
		</div>
	</main>



	@stack('scripts')
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>

</html>