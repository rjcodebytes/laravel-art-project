@extends('layouts.app')

@section('content')
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-36 md:mt-40 mb-8">
		<!-- Headline / Subheadline -->
		<div class="text-center mb-10 animate-item animate-headline">
			<h1 class="text-5xl md:text-6xl font-serif font-extrabold text-[#564b49] tracking-tight">Get in Touch</h1>
			<p class="mt-4 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
				Interested in a piece? Have a commission in mind? I'd love to hear from you and discuss how we can bring
				your vision to life.
			</p>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
			<!-- Left: Form card (spans 2 columns on large screens) -->
			<div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-8 animate-item animate-form-card">
				<h2 class="text-2xl font-bold mb-6">Send me a message</h2>

				@if(session('success'))
					<div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-4">
						{{ session('success') }}
					</div>
				@endif

				@if(session('error'))
					<div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded mb-4">
						{{ session('error') }}
					</div>
				@endif

				@if ($errors->any())
					<div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded mb-4 text-sm">
						Please fix the highlighted fields.
					</div>
				@endif

				<form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
					@csrf

					<div class="form-row">
						<label class="block text-sm font-medium text-gray-700">Full Name *</label>
						<input type="text" name="name" value="{{ old('name') }}"
							class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-200 @error('name') border-red-400 @enderror"
							placeholder="Your full name">
						@error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
					</div>

					<div class="form-row">
						<label class="block text-sm font-medium text-gray-700">Email Address *</label>
						<input type="email" name="email" value="{{ old('email') }}"
							class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-200 @error('email') border-red-400 @enderror"
							placeholder="your.email@example.com">
						@error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
					</div>

					<div class="form-row">
						<label class="block text-sm font-medium text-gray-700">Artwork Interested In</label>
						<input type="text" name="artwork" value="{{ old('artwork') }}"
							class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-200"
							placeholder="Specific artwork or commission idea">
					</div>

					<div class="form-row">
						<label class="block text-sm font-medium text-gray-700">Message *</label>
						<textarea name="message" rows="6"
							class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-200 @error('message') border-red-400 @enderror"
							placeholder="Tell me about your interest in my work or commission ideas...">{{ old('message') }}</textarea>
						@error('message') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
					</div>

					<div class="mt-4 form-row">
						<button type="submit"
							class="w-full inline-flex items-center justify-center gap-3 bg-gray-900 hover:bg-black text-white font-medium px-5 py-3 rounded-md">
							<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M3 10l9-7 9 7-9 7-9-7z" />
							</svg>
							Send Message
						</button>
					</div>
				</form>
			</div>

			<!-- Right: Contact info + WhatsApp + Socials -->
			<div class="space-y-6">
				<!-- Contact card -->
				<div class="bg-white rounded-xl shadow-lg p-6 animate-item animate-right-card">
					<h3 class="text-lg font-semibold mb-4">Contact Information</h3>
					<ul class="space-y-4 text-sm text-gray-700">
						<li class="flex items-start gap-3">
							<span class="flex-shrink-0 bg-yellow-50 text-yellow-700 p-2 rounded-full">
								<i class="fa-solid fa-envelope"></i>
							</span>
							<div>
								<p class="text-gray-500 text-xs">Email</p>
								<p class="text-sm">{{ config('mail.from.address') }}</p>
							</div>
						</li>
						<li class="flex items-start gap-3">
							<span class="flex-shrink-0 bg-yellow-50 text-yellow-700 p-2 rounded-full">
								<i class="fa-solid fa-phone"></i>
							</span>
							<div>
								<p class="text-gray-500 text-xs">Phone</p>
								<p class="text-sm">+1 (555) 123-4567</p>
							</div>
						</li>
						<li class="flex items-start gap-3">
							<span class="flex-shrink-0 bg-yellow-50 text-yellow-700 p-2 rounded-full">
								<i class="fa-solid fa-location-dot"></i>
							</span>
							<div>
								<p class="text-gray-500 text-xs">Studio</p>
								<p class="text-sm">Barcelona, Spain</p>
							</div>
						</li>
					</ul>
				</div>

				<!-- WhatsApp / Instant Connect -->
				<div class="bg-white rounded-xl shadow-lg p-6 animate-item animate-right-card">
					<h3 class="text-lg font-semibold mb-4">Connect Instantly</h3>
					<a href="https://wa.me/1234567890" target="_blank"
						class="block w-full text-center bg-green-500 hover:bg-green-600 text-white py-3 rounded-md font-medium">
						<i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp Chat
					</a>

					<hr class="my-4">

					<p class="text-sm text-gray-500 mb-3">Follow my journey</p>
					<div class="flex gap-3">
						<a href="#"
							class="w-10 h-10 rounded-md bg-gradient-to-tr from-pink-500 to-yellow-400 flex items-center justify-center text-white">
							<i class="fa-brands fa-instagram"></i>
						</a>
						<a href="#" class="w-10 h-10 rounded-md bg-blue-600 flex items-center justify-center text-white">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- GSAP + ScrollTrigger animation for contact page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			if (typeof gsap === 'undefined') return;
			gsap.registerPlugin(ScrollTrigger);

			// Animate each block with a fade up and staggered children
			gsap.utils.toArray('.animate-item').forEach((el) => {
				// main reveal for block
				gsap.from(el, {
					autoAlpha: 0,
					y: 30,
					duration: 0.8,
					ease: 'power3.out',
					scrollTrigger: {
						trigger: el,
						start: 'top 90%',
						once: true
					}
				});

				// stagger children if present (form rows, list items, buttons)
				const children = el.querySelectorAll('.form-row, li, .feature, .cta-buttons, .mt-4 a, button');
				if (children && children.length) {
					gsap.from(children, {
						autoAlpha: 0,
						y: 18,
						duration: 0.6,
						stagger: 0.08,
						ease: 'power2.out',
						scrollTrigger: {
							trigger: el,
							start: 'top 90%',
							once: true
						}
					});
				}
			});
		});
	</script>
@endsection