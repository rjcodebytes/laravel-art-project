<footer class="bg-[#1c1311] text-gray-300 pt-10 pb-5">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <img src="{{ asset('logo.webp') }}" alt="Logo" class="h-20 mb-4">

            <div class="flex items-center gap-3 mt-3">
                <a href="https://www.facebook.com/share/16pJPdorvF/"
                    class="w-9 h-9 bg-white rounded-full flex items-center justify-center text-[#1c1311] hover:bg-[#f3e9df] transition shadow-sm">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/yashwanttgarud?igsh=MXA0a21tNWFxeWs1NQ=="
                    class="w-9 h-9 bg-white rounded-full flex items-center justify-center text-[#1c1311] hover:bg-[#f3e9df] transition shadow-sm">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://youtube.com/@yashwantgarud1746?si=MaQ1QJgwtLkinl13"
                    class="w-9 h-9 bg-white rounded-full flex items-center justify-center text-[#1c1311] hover:bg-[#f3e9df] transition shadow-sm">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                
            </div>
        </div>
        <div class="col-span-2">
            <div class="grid grid-cols-2 gap-6 sm:gap-10">
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/collection" class="hover:text-[#d4b28c] transition">Collection</a></li>
                        <li><a href="/about" class="hover:text-[#d4b28c] transition">About</a></li>
                        <li><a href="/blogs" class="hover:text-[#d4b28c] transition">Blogs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="/contact" class="hover:text-[#d4b28c] transition">Contact</a></li>
                        <li><a href="/terms-and-conditions" class="hover:text-[#d4b28c] transition">Terms & Conditions</a></li>
                        <li><a href="/privacy-policy" class="hover:text-[#d4b28c] transition">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-700 mt-10 pt-5 text-center text-sm text-gray-400">
        © {{ date('Y') }} Yashwant Garud. All rights reserved.
    </div>

    {{--<div class="text-center text-xs text-gray-400 mt-2">
        Designed &amp; Developed by
        <a href="https://www.linkedin.com/company/oneinmedia" target="_blank" rel="noopener noreferrer"
           class="text-[#d4b28c] hover:underline ml-1">1inMedia</a>
    </div>--}}
</footer>