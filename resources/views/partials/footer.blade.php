<footer class="bg-[#1c1311] text-gray-300 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">

        <!-- Logo + Social Links -->
        <div >
            <img src="{{ asset('logo.webp') }}" alt="Logo" class="h-20 mb-4">

            <div class="flex items-center gap-4 mt-4">
                <a href="#" class="text-gray-300 hover:text-[#d4b28c] transition">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-[#d4b28c] transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-[#d4b28c] transition">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="mailto:yashwantgarud77@gmail.com" class="text-gray-300 hover:text-[#d4b28c] transition">
                    <i class="fa-solid fa-envelope"></i>
                </a>
                <a href="tel:+919284242035" class="text-gray-300 hover:text-[#d4b28c] transition">
                    <i class="fa-solid fa-phone"></i>
                </a>
            </div>
        </div>

        <!-- Quick Links + Support -->
        <div class="col-span-2">
            <div class="grid grid-cols-2 gap-6 sm:gap-10">
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/collection" class="hover:text-[#d4b28c] transition">Collection</a></li>
                        <li><a href="/about" class="hover:text-[#d4b28c] transition">About</a></li>
                        <li><a href="/my-blogs" class="hover:text-[#d4b28c] transition">My Blogs</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="/contact" class="hover:text-[#d4b28c] transition">Contact</a></li>
                        <li><a href="/terms" class="hover:text-[#d4b28c] transition">Terms & Conditions</a></li>
                        <li><a href="/privacy" class="hover:text-[#d4b28c] transition">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Subscribe Section -->
        <div>
            <h3 class="text-white font-semibold mb-4">Subscribe for Updates</h3>
            <p class="text-sm leading-relaxed mb-4">
                Get the latest news and updates straight to your inbox.
            </p>
            <form action="#" method="POST" class="flex flex-col sm:flex-row gap-3">
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    required
                    class="px-4 py-2 rounded-md border-2 border-[#c29e7f] flex-1 focus:outline-none"
                >
                <button 
                    type="submit" 
                    class="bg-[#d4b28c] text-[#1c1311] px-4 py-2 cursor-pointer rounded-md font-semibold hover:bg-[#c29e7f] transition"
                >
                    Subscribe
                </button>
            </form>
        </div>

    </div>

    <div class="border-t border-gray-700 mt-10 pt-5 text-center text-sm text-gray-400">
        © {{ date('Y') }} Yashwant Garud. All rights reserved.
    </div>
</footer>