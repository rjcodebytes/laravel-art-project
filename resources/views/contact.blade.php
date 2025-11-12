@extends('layouts.app')
@section('title', 'Contact Yashwant Garud - Get in Touch for Art Commissions & Exhibitions')
@section('meta_description', 'Reach out to Yashwant Garud for art inquiries, exhibition collaborations, and custom Ajanta-inspired painting commissions.')
@section('meta_keywords', 'contact artist, art commissions, exhibitions, Yashwant Garud contact, custom paintings, Ajanta art')

@section('content')
	<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-36 md:mt-30 mb-8">
		<div class="mb-10 animate-item animate-headline text-center lg:text-left lg:flex lg:flex-col lg:items-start">
			<h1 data-aos="fade-up" class="text-4xl md:text-6xl font-serif font-extrabold text-[#564b49] tracking-tight">
				Get in Touch
			</h1>
			<p data-aos="fade-up" data-aos-delay="100" class="mt-4 text-lg md:text-xl text-gray-600 max-w-3xl lg:max-w-2xl mx-auto lg:mx-0">
				Interested in the collection? Let’s connect and bring a touch of Ajanta’s timeless art into your space.
			</p>
		</div>


		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
			<div data-aos="fade-up" data-aos-delay="150" class="max-w-2xl lg:col-span-2 bg-white rounded-xl shadow-lg p-8 animate-item animate-form-card">
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

					<div class="mt-4 form-row group">
						<button type="submit"
							class="w-full inline-flex items-center justify-center gap-3 bg-[#8B5E3C] hover:bg-[#5C4033] active:bg-[#5C4033] text-white font-medium px-5 py-3 rounded-md">
							<i
								class="fa-solid fa-paper-plane group-hover:rotate-45  group-active:rotate-45 transition-all duration-300"></i>
							Submit
						</button>
					</div>
				</form>
			</div>
			<div data-aos="fade-up" data-aos-delay="200" class=" space-y-6">
				<div class="bg-white rounded-xl shadow-lg p-6 animate-item animate-right-card">
					<h3 class="text-lg font-semibold mb-4">I always love to hear from you</h3>
					<p class="text-sm text-gray-700 mb-4 leading-relaxed">
						To contact me, please send an email to
						<a href="mailto:yashwantgarud77@gmail.com"
							class="text-[#564b49] font-medium">yashwantgarud77@gmail.com</a>.
						Also, reach out on my social handles — like or follow me to stay updated!
					</p>

					<p class="text-sm text-gray-500 mb-3">Follow my journey</p>
					<div class="flex gap-3">
						<a href="https://www.facebook.com/share/16pJPdorvF/" class="w-10 h-10 rounded-md bg-blue-600 flex items-center justify-center text-white">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a href="https://www.instagram.com/yashwanttgarud?igsh=MXA0a21tNWFxeWs1NQ=="
							class="w-10 h-10 rounded-md bg-gradient-to-tr from-pink-500 to-yellow-400 flex items-center justify-center text-white">
							<i class="fa-brands fa-instagram"></i>
						</a>
						<a href="https://youtube.com/@yashwantgarud1746?si=MaQ1QJgwtLkinl13" class="w-10 h-10 rounded-md bg-red-600 flex items-center justify-center text-white">
							<i class="fa-brands fa-youtube"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection