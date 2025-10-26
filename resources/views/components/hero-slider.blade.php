<div id="hero-slider" class="relative w-full h-screen overflow-hidden bg-black">
    <!-- Slides container -->
    <div class="absolute inset-0 flex transition-transform duration-[2500ms] ease-in-out" id="slides-container"></div>

    <!-- CTA Buttons -->
    <div
        class="cta-buttons absolute bottom-10 md:bottom-20 left-1/2 -translate-x-1/2 flex flex-wrap justify-center gap-3 sm:gap-4 z-20 px-4">
        <!-- Enquiry Button -->
        <a href="{{ route('contact.show') }}"
            class="group inline-flex items-center justify-center gap-2 w-full sm:w-auto text-center px-5 sm:px-6 py-2.5 sm:py-3 rounded-md font-semibold text-[#e8ded4]
            backdrop-blur-md bg-white/30 shadow-md hover:shadow-lg active:shadow-lg hover:bg-white/40 active:bg-white/40 transition-all duration-300 text-sm sm:text-base">
            Enquiry
            <i
                class="fa-solid fa-arrow-right fa-sm transition-transform duration-300 group-hover:translate-x-1 -rotate-45 group-hover:rotate-0 group-active:rotate-0 group-active:translate-x-1"></i>
        </a>

        <!-- View Collection Button -->
        <a href="{{ route('collection.index') }}"
            class="group inline-flex items-center justify-center gap-2 w-full sm:w-auto text-center px-5 sm:px-6 py-2.5 sm:py-3 rounded-md font-semibold text-[#e8ded4]
            backdrop-blur-md bg-[#564b49]/60 shadow-md hover:shadow-lg active:shadow-lg hover:bg-[#564b49]/80 active:bg-[#564b49]/80 transition-all duration-300 text-sm sm:text-base">
            View Collection
            <i
                class="fa-solid fa-arrow-right fa-sm transition-transform duration-300 group-hover:translate-x-1 -rotate-45 group-hover:rotate-0 group-active:rotate-0 group-active:translate-x-1"></i>
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('slides-container');
        const desktopSlides = [
            '/images/i1.webp',
            '/images/i2.webp',
            '/images/i3.webp'
        ];
        const mobileSlides = [
            '/images/mi1.webp',
            '/images/mi2.webp',
            '/images/mi3.webp'
        ];

        let currentSet = [];
        let currentIndex = 0;
        let totalSlides = 0;
        let interval;

        function getCurrentSlides() {
            return window.innerWidth < 768 ? mobileSlides : desktopSlides;
        }

        function preloadImages(slides) {
            return Promise.all(
                slides.map(src => new Promise(resolve => {
                    const img = new Image();
                    img.src = src;
                    img.onload = resolve;
                    img.onerror = resolve;
                }))
            );
        }

        async function loadSlides() {
            const slides = getCurrentSlides();
            if (JSON.stringify(slides) === JSON.stringify(currentSet)) return; // avoid reload

            currentSet = slides;
            container.innerHTML = '';
            currentIndex = 0;

            await preloadImages(slides);

            slides.forEach(src => {
                const slide = document.createElement('div');
                slide.className = 'w-full flex-shrink-0 relative';
                slide.innerHTML = `
                <img src="${src}" class="w-full h-screen object-cover" loading="lazy" alt="slide">
                <div class="absolute inset-0 bg-black/60"></div>
            `;
                container.appendChild(slide);
            });

            // Clone first slide for infinite loop
            const firstClone = container.children[0].cloneNode(true);
            container.appendChild(firstClone);

            totalSlides = slides.length;
            container.style.transition = 'transform 2500ms ease-in-out';
            container.style.transform = 'translateX(0)';
        }

        function startSlider() {
            clearInterval(interval);
            interval = setInterval(() => {
                currentIndex++;
                container.style.transform = `translateX(-${currentIndex * 100}%)`;

                if (currentIndex === totalSlides) {
                    setTimeout(() => {
                        container.style.transition = 'none';
                        container.style.transform = 'translateX(0)';
                        currentIndex = 0;
                        setTimeout(() => {
                            container.style.transition = 'transform 2500ms ease-in-out';
                        }, 100);
                    }, 2500);
                }
            }, 7000);
        }

        // Initialize
        loadSlides().then(startSlider);

        // Update on resize (switch between desktop/mobile)
        window.addEventListener('resize', async () => {
            await loadSlides();
            startSlider();
        });
    });
</script>