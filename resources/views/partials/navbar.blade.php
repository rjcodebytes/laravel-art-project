<nav class="absolute top-0 left-0 w-full z-50
    {{ request()->is('/') 
	? 'bg-transparent'
	: 'bg-[#1a1817]/90 backdrop-blur-md shadow-md' }}">
	<div class="max-w-7xl mx-auto px-6 py-6 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
		<div class="flex justify-between items-center h-16">
			<!-- Logo -->
			<div class="flex items-center">
				<a href="{{ url('/') }}" class="flex items-center space-x-3">
					<img src="{{ asset('logo.webp') }}" alt="Logo"
						class="h-24 sm:h-20 md:h-24 lg:h-34 w-auto object-contain">
				</a>
			</div>

			<!-- Desktop links -->
			<div class="hidden md:flex md:items-center md:space-x-8">
				<a href="{{ url('/') }}" class="text-lg font-medium text-[#e8ded4] hover:text-white transition">Home</a>
				<a href="{{ url('/#gallery') }}"
					class="text-lg font-medium text-[#e8ded4] hover:text-white transition">Gallery</a>
				<a href="{{ url('/about') }}"
					class="text-lg font-medium text-[#e8ded4] hover:text-white transition">About</a>
				<a href="{{ url('/collection') }}"
					class="text-lg font-medium text-[#e8ded4] hover:text-white transition">Collection</a>
			</div>

			<!-- Mobile menu button -->
			<div class="md:hidden">
				<button id="nav-toggle" aria-controls="mobile-menu" aria-expanded="false"
					class="inline-flex items-center justify-center p-2 rounded-md text-[#e8ded4] hover:text-white hover:bg-white/10 focus:outline-none transition"
					type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden'); 
						this.setAttribute('aria-expanded', 
						this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true')">
					<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
			</div>
		</div>
	</div>

	<!-- Mobile menu -->
	<div id="mobile-menu" class="md:hidden hidden border-t border-white/20 bg-black/40 backdrop-blur-md">
		<div class="px-4 pt-3 pb-4 space-y-1">
			<a href="{{ url('/') }}"
				class="block px-3 py-2 rounded-md text-base font-medium text-[#e8ded4] hover:bg-white/10">Home</a>
			<a href="#"
				class="block px-3 py-2 rounded-md text-base font-medium text-[#e8ded4] hover:bg-white/10">Gallery</a>
			<a href="#"
				class="block px-3 py-2 rounded-md text-base font-medium text-[#e8ded4] hover:bg-white/10">About</a>
			<a href="#"
				class="block px-3 py-2 rounded-md text-base font-medium text-[#e8ded4] hover:bg-white/10">Collection</a>
		</div>
	</div>
</nav>