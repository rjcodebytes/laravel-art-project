<nav class="bg-white border-b border-gray-200">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between items-center h-16">
			<div class="flex items-center">
				<a href="{{ url('/') }}" class="text-lg font-semibold text-gray-900">
					{{ config('app.name', 'Art Project') }}
				</a>
			</div>

			<!-- Desktop links -->
			<div class="hidden md:flex md:items-center md:space-x-6">
				<a href="{{ url('/') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Home</a>
				<a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">Gallery</a>
				<a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">About</a>
			</div>

			<!-- Mobile menu button -->
			<div class="md:hidden">
				<button id="nav-toggle" aria-controls="mobile-menu" aria-expanded="false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none" type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden'); this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true')">
					<span class="sr-only">Open main menu</span>
					<!-- Simple hamburger icon -->
					<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
					</svg>
				</button>
			</div>
		</div>
	</div>

	<!-- Mobile menu -->
	<div id="mobile-menu" class="md:hidden hidden border-t border-gray-100">
		<div class="px-4 pt-3 pb-4 space-y-1">
			<a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Home</a>
			<a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Gallery</a>
			<a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">About</a>
		</div>
	</div>
</nav>
