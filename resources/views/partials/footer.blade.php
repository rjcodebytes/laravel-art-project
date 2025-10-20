<footer class="bg-gradient-to-r from-black via-gray-800 to-yellow-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Top Section: Logo + Links -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('logo.webp') }}" alt="{{ config('app.name', 'Art Project') }} Logo" class="h-12 w-auto">
                
            </div>

            <!-- Navigation Links -->
            <nav class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-6 text-sm">
                <a href="#" class="hover:text-yellow-400 transition">Home</a>
                <a href="#" class="hover:text-yellow-400 transition">About</a>
                <a href="#" class="hover:text-yellow-400 transition">Services</a>
                <a href="#" class="hover:text-yellow-400 transition">Portfolio</a>
                <a href="#" class="hover:text-yellow-400 transition">Contact</a>
                <a href="#" class="hover:text-yellow-400 transition">Privacy</a>
                <a href="#" class="hover:text-yellow-400 transition">Terms</a>
            </nav>
        </div>

        <!-- Bottom Section: Social Media + Copyright -->
        <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-gray-700 pt-6">
            <!-- Social Icons -->
            <div class="flex space-x-6 text-lg">
                <a href="#" class="hover:text-yellow-400 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-yellow-400 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-yellow-400 transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-yellow-400 transition"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="hover:text-yellow-400 transition"><i class="fab fa-youtube"></i></a>
            </div>

            <!-- Copyright -->
            <div class="text-sm text-gray-300">
                © {{ date('Y') }} {{ config('app.name', 'Art Project') }}. All rights reserved.
            </div>
        </div>
    </div>
</footer>

<!-- Font Awesome CDN -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
