<section data-aos="fade-up" class="py-10 relative overflow-hidden">
    <div class="text-center">
        <span class="text-sm font-semibold text-[#a57c48] uppercase tracking-wider">Testimonials</span>
        <h2 class="text-3xl font-bold text-[#3b2e27] font-serif mt-2">Voices of Appreciation</h2>
    </div>

    <div class="relative flex justify-center items-center w-full mt-8 px-4 sm:px-6 lg:px-16 xl:px-24">
        <div id="testimonialSlider"
            class="relative flex items-center justify-center w-full max-w-5xl h-auto min-h-[460px] sm:min-h-[400px]">
            
            <!-- Testimonial Slides -->
            @foreach ([ 
                ['quote' => "These paintings reflect a deep study and true understanding of Ajanta’s art. Every line and colour feels alive, showing skill, patience, and devotion. The artist hasn’t just copied ancient painting, he has revived them with new energy and grace, keeping Ajanta’s legacy breathing in today’s time.", 
                 'name' => "L. Z. Kolhe", 
                 'title' => "Retired Art Teacher & Ajanta Researcher, Jalgaon"],

                ['quote' => "Yashwant Garud’s Ajanta-inspired paintings reflect remarkable finesse and clarity. Each artwork seems to speak to the viewer, capturing the spirit and depth of the original cave murals. Through his brushwork, the timeless beauty of Ajanta comes alive once again.", 
                 'name' => "Dilip Tiwari", 
                 'title' => "Senior Journalist & Art Researcher"],

                ['quote' => "I witnessed an extraordinary exhibition that beautifully brings the spirit of Ajanta to life. Each painting reveals the depth and elegance of our ancient cultural heritage, rendered with remarkable clarity and devotion. The artworks truly reconnect us with the timeless soul of Indian art.", 
                 'name' => "Prof. Pramod Mahulikar", 
                 'title' => "Pro Vice Chancellor, K.B.C N.M.U, Jalgaon"],

                ['quote' => "I saw a rare and precise exhibition. It clearly awakened awareness of our cultural heritage and native sensibilities. Such artistic presentation shows cultural depth and gives the viewer a pure experience. I salute this effort with respect.", 
                 'name' => "Dr. Manisha Jagtap", 
                 'title' => "HOD, Lifelong Learning & Extension, K.B.C N.M.U, Jalgaon"],

                ['quote' => "Ajanta is not just art, it is a cultural essence that flows through every Indian artist’s veins. Yashwant Garud is an artist who has truly lived and breathed colors and lines. The human figures in his paintings feel profoundly close to the divine. Heartfelt wishes to this artist, may his art continue to reach deeper, towards a meditative mastery.", 
                 'name' => "Eknath Deshmukh", 
                 'title' => "Senior Poet & Writer, Jalgaon"]
            ] as $t)
                <div class="testimonial-slide absolute w-[85%] lg:w-[75%] bg-white shadow-xl rounded-3xl p-6 sm:p-8 lg:p-10 text-center transition-all duration-700 ease-[cubic-bezier(0.4,0,0.2,1)] mx-4 sm:mx-6">
                    <div class="text-[60px] sm:text-[70px] lg:text-[80px] text-[#b89b75] leading-none opacity-70 mb-3">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <p class="text-[#4a3b32] text-base sm:text-lg italic leading-relaxed mt-3">
                        {{ $t['quote'] }}
                    </p>
                    <div class="mt-6">
                        <h4 class="font-semibold text-[#7a5e3a] text-base sm:text-lg">{{ $t['name'] }}</h4>
                        <p class="text-sm text-[#9c8a7c]">{{ $t['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <button id="prevBtn"
            class="absolute left-2 sm:left-5 bg-white hover:bg-[#d6c5ae] text-[#4a3b32] rounded-full w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center shadow-md transition duration-300 z-30">
            <i class="fa-solid fa-chevron-left text-sm sm:text-base"></i>
        </button>
        <button id="nextBtn"
            class="absolute right-2 sm:right-5 bg-white hover:bg-[#d6c5ae] text-[#4a3b32] rounded-full w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center shadow-md transition duration-300 z-30">
            <i class="fa-solid fa-chevron-right text-sm sm:text-base"></i>
        </button>
    </div>

    <!-- Pagination Dots -->
    <div class="flex justify-center mt-10 space-x-2">
        <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-[#a57c48]"></span>
        <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gray-300"></span>
        <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gray-300"></span>
        <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gray-300"></span>
        <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gray-300"></span>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.testimonial-slide');
    const dots = document.querySelectorAll('.dot');
    let current = 0;

    const positionSlides = () => {
        slides.forEach((slide) => {
            slide.style.zIndex = '5';
            slide.style.opacity = '0';
            slide.style.transform = 'translateX(0) scale(0.9)';
        });

        const prev = (current - 1 + slides.length) % slides.length;
        const next = (current + 1) % slides.length;

        const isMobile = window.innerWidth < 768;

        if (isMobile) {
            slides[current].style.zIndex = '20';
            slides[current].style.opacity = '1';
            slides[current].style.transform = 'translateX(0) scale(1)';
        } else {
            slides[current].style.zIndex = '20';
            slides[current].style.opacity = '1';
            slides[current].style.transform = 'translateX(0) scale(1.15)';

            slides[prev].style.zIndex = '10';
            slides[prev].style.opacity = '0.5';
            slides[prev].style.transform = 'translateX(-40%) scale(0.9)';

            slides[next].style.zIndex = '10';
            slides[next].style.opacity = '0.5';
            slides[next].style.transform = 'translateX(40%) scale(0.9)';
        }

        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-[#a57c48]', i === current);
            dot.classList.toggle('bg-gray-300', i !== current);
        });
    };

    document.getElementById('nextBtn').addEventListener('click', () => {
        current = (current + 1) % slides.length;
        positionSlides();
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        current = (current - 1 + slides.length) % slides.length;
        positionSlides();
    });

    window.addEventListener('resize', positionSlides);
    positionSlides();
});
</script>
