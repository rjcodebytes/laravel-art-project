<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title', config('app.name', 'Laravel Art Project'))</title>

	<!-- Meta Tags -->
	<meta name="description"
		content="@yield('meta_description', 'Explore contemporary artworks and collections by Yashwant Garud. Oil, acrylic, and digital paintings for collectors.')">
	<meta name="keywords"
		content="@yield('meta_keywords', 'art, paintings, contemporary art, portrait, landscape, oil painting, acrylic, digital art')">
	<meta name="robots" content="index, follow">
	<link rel="canonical" href="{{ url()->current() }}">

	<!-- Open Graph / Social Media -->
	<meta property="og:title" content="@yield('og_title', config('app.name', 'Laravel Art Project'))">
	<meta property="og:description"
		content="@yield('og_description', 'Discover curated artworks and collections by Yashwant Garud.')">
	<meta property="og:type" content="@yield('og_type', 'website')">
	<meta property="og:url" content="{{ url()->current() }}">
	<meta property="og:image" content="@yield('og_image', asset('logo.webp'))">
	<meta property="og:site_name" content="{{ config('app.name', 'Laravel Art Project') }}">

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'Laravel Art Project'))">
	<meta name="twitter:description"
		content="@yield('twitter_description', 'Discover curated artworks and collections by Yashwant Garud.')">
	<meta name="twitter:image" content="@yield('twitter_image', asset('logo.webp'))">

	<!-- Favicons -->
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
	<link rel="manifest" href="{{ asset('site.webmanifest') }}">

	<!-- Tailwind via Vite -->
	@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
		@vite(['resources/css/app.css', 'resources/js/app.js'])
	@endif

	<script src="{{ asset('js/structured-data.js') }}"></script>

	@stack('styles')
	<script src="https://kit.fontawesome.com/e37f90b971.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen flex flex-col bg-[#faf8f5] text-gray-900">
	{{-- Navbar --}}
	@includeIf('partials.navbar')

	{{-- Main Content --}}
	<main class="flex-1">
		@yield('content')
	</main>

	{{-- Footer --}}
	@includeIf('partials.footer')

	{{-- Scripts --}}
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
	@stack('scripts')
</body>

</html>