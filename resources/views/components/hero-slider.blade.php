<div id="hero-slider" class="relative w-full h-screen overflow-hidden bg-black">
    <div class="absolute inset-0 flex transition-transform duration-[2500ms] ease-in-out" id="slides-container"></div>

    <div data-aos="fade-up"
        class="absolute bottom-20 md:bottom-15 left-1/2 -translate-x-1/2 flex flex-col items-center justify-center text-center z-20 px-4">
        <h2 class="text-[#e8ded4] text-xl sm:text-3xl md:text-4xl font-serif font-semibold mb-6 drop-shadow-lg 
        leading-snug sm:leading-tight 
        max-w-[260px] sm:max-w-none"> <!-- 👈 limits width on mobile for 2-line wrap -->
        Discover the timeless beauty of Ajanta
    </h2>

        <a href="{{ route('collection.index') }}" class="group inline-flex items-center justify-center 
          w-auto sm:w-auto  <!-- 👈 no full width on mobile -->
          bg-[#d4b28c] hover:bg-[#c19a74] active:bg-[#c19a74] 
          text-[#1a1817] font-semibold text-base sm:text-lg 
          whitespace-nowrap  <!-- 👈 prevents text breaking -->
          px-6 sm:px-8 py-3 sm:py-4 
          rounded-full shadow-lg 
          transition-all duration-300 transform 
          hover:-translate-y-1 active:-translate-y-1">

            <span class="transition-transform duration-300">View Collection</span>

            <i
                class="fa-solid fa-arrow-right fa-sm ml-2 transform -translate-x-0 -rotate-45 transition-all duration-300 group-hover:translate-x-1 group-hover:rotate-0 group-active:translate-x-1 group-active:rotate-0">
            </i>
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('slides-container');
        const desktopSlides = [
            '/images/i1.jpg',
            '/images/i2.jpg',
            '/images/i3.jpg'
        ];
        const mobileSlides = [
            '/images/mi1.jpg',
            '/images/mi2.jpg',
            '/images/mi3.jpg'
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
            if (JSON.stringify(slides) === JSON.stringify(currentSet)) return;

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
            }, 5000);
        }

        loadSlides().then(startSlider);

        window.addEventListener('resize', async () => {
            await loadSlides();
            startSlider();
        });
    });
</script>