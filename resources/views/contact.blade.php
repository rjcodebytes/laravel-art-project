<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact | {{ config('app.name', 'Laravel Art Project') }}</title>

	@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
		@vite(['resources/css/app.css', 'resources/js/app.js'])
	@else
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	@endif

	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/e37f90b971.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-inter">
	<header class="py-6 bg-white shadow">
		<div class="container mx-auto px-6 flex items-center justify-between">
			<h1 class="text-2xl font-semibold">{{ config('app.name', 'Laravel Art Project') }}</h1>
			<nav class="space-x-4 text-sm">
				<a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
				<a href="/gallery" class="text-gray-600 hover:text-gray-900">Gallery</a>
				<a href="/about" class="text-gray-600 hover:text-gray-900">About</a>
				<a href="/contact" class="text-gray-600 hover:text-gray-900">Contact</a>
			</nav>
		</div>
	</header>

	<main class="container mx-auto px-6 py-12">
		<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-8">
			<h2 class="text-2xl font-bold mb-4">Get in touch</h2>

			@if(session('success'))
				<div class="bg-green-100 border border-green-200 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
			@endif

			<form action="/contact" method="POST" class="space-y-4">
				@csrf
				<div>
					<label class="block text-sm font-medium text-gray-700">Name</label>
					<input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
				</div>
				<div>
					<label class="block text-sm font-medium text-gray-700">Email</label>
					<input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
				</div>
				<div>
					<label class="block text-sm font-medium text-gray-700">Message</label>
					<textarea name="message" rows="5" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"></textarea>
				</div>
				<div class="text-right">
					<button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded">Send Message</button>
				</div>
			</form>
		</div>
	</main>

	<footer class="py-6 bg-white mt-12">
		<div class="container mx-auto px-6 text-center text-sm text-gray-500">
			&copy; {{ date('Y') }} {{ config('app.name', 'Laravel Art Project') }}. All rights reserved.
		</div>
	</footer>
</body>
</html>
