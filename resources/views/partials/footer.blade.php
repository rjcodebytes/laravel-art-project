<footer class="bg-[#302f2e] text-gray-300 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">

        <!-- Logo + Description -->
        <div>
            <img src="{{ asset('logo.webp') }}" alt="Logo" class="h-20 mb-4">
            <p class="text-sm leading-relaxed">
                Contemporary artist exploring the intersection of traditional techniques 
                and modern expression through oil, acrylic, and digital mediums.
            </p>
        </div>

        <!-- Quick Links + Support (side by side on mobile) -->
        <div class="col-span-2">
            <div class="grid grid-cols-2 gap-6 sm:gap-10">
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/collection" class="hover:text-[#d4b28c] transition">Collection</a></li>
                        <li><a href="/about" class="hover:text-[#d4b28c] transition">About</a></li>
                        <li><a href="/news" class="hover:text-[#d4b28c] transition">My Blogs</a></li>
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

        <!-- Contact Info -->
        <div>
            <h3 class="text-white font-semibold mb-4">Get in Touch</h3>
            <ul class="space-y-3">
                <li class="flex items-center gap-3">
                    <i class="fa-solid fa-envelope text-[#d4b28c]"></i>
                    <a href="mailto:yashwantgarud77@gmail.com" class="hover:text-[#d4b28c] transition">yashwantgarud77@gmail.com</a>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fa-solid fa-phone text-[#d4b28c]"></i>
                    <a href="tel:+919284242035" class="hover:text-[#d4b28c] transition">+91 9284242035</a>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fa-brands fa-instagram text-[#d4b28c]"></i>
                    <a href="#" class="hover:text-[#d4b28c] transition">@elenamartinezart</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-700 mt-10 pt-5 text-center text-sm text-gray-400">
        © {{ date('Y') }} Yashwant Garud. All rights reserved.
    </div>
</footer>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a2e0a0f6f0.js" crossorigin="anonymous"></script>
