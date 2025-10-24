<section id="gallery" class="relative pt-20 bg-[#faf8f5] overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-8 md:mb-16 animate-featured-header">
            <h2 class="text-4xl sm:text-5xl font-extrabold font-serif text-[#564b49] mb-4">
                Featured Artworks RJ
            </h2>
            <p class="text-lg text-gray-600">
                Discover our collection of curated portrait and landscape paintings.
            </p>
        </div>

        <!-- Custom Grid Layout -->
        <div class="grid grid-cols-2 gap-4 lg:gap-8 group">
            <!-- Row 1 -->
            <div class="painting opacity-0 translate-y-10">
                <img src="/images/featured/f1.webp" alt="Painting 1"
                    class="w-full h-[250px] lg:h-[500px] translate-y-10 transition-all duration-500 hover:shadow-[10px_10px_rgba(0,0,0,0.2)] active:shadow-[10px_10px_rgba(0,0,0,0.2)]" />
            </div>

            <div class="painting opacity-0 translate-y-10">
                <img src="/images/featured/f2.webp" alt="Painting 2"
                    class="w-full h-[150px] lg:h-[350px] translate-y-10 transition-all duration-500 hover:shadow-[10px_10px_rgba(0,0,0,0.2)] active:shadow-[10px_10px_rgba(0,0,0,0.2)]" />
            </div>

            <div class="painting opacity-0 translate-y-10">
                <img src="/images/featured/f3.webp" alt="Painting 4"
                    class="w-full h-[200px] lg:h-[400px] translate-y-10 transition-all duration-500 hover:shadow-[10px_10px_rgba(0,0,0,0.2)] active:shadow-[10px_10px_rgba(0,0,0,0.2)]" />
            </div>

            <div class="painting opacity-0 translate-y-10 relative bottom-25 lg:bottom-38">
                <img src="/images/featured/f4.webp" alt="Painting 3"
                    class="w-full h-[300px] lg:h-[550px] translate-y-10 transition-all duration-500 hover:shadow-[10px_10px_rgba(0,0,0,0.2)] active:shadow-[10px_10px_rgba(0,0,0,0.2)]" />
            </div>
        </div>

        <!-- View More Button -->
        <div class="text-center relative bottom-10 lg:bottom-20 animate-featured-header-button">
            <a href="/collection"
                class="group inline-flex items-center justify-center bg-[#d4b28c] hover:bg-[#c19a74] active:bg-[#c19a74] text-[#1a1817] font-semibold text-lg px-8 py-4 rounded-full shadow-lg transition-all duration-300 transform hover:-translate-y-1 active:-translate-y-1">

                <span class=" transition-transform duration-300 ">View More</span>

                <span
                    class="inline-block transform -translate-x-2 opacity-0 transition-all duration-300 group-hover:translate-x-1 group-active:translate-x-1 group-hover:opacity-100 group-active:opacity-100    ">
                    →
                </span>
            </a>
        </div>

    </div>
</section>

<!-- GSAP + ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.registerPlugin(ScrollTrigger);

        // animate header
        gsap.from(".animate-featured-header", {
            autoAlpha: 0,
            y: 28,
            duration: 0.9,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".animate-featured-header",
                start: "top 90%",
                toggleActions: "play none none reset"
            }
        });

        gsap.from(".animate-featured-header-button", {
            autoAlpha: 0,
            y: 28,
            duration: 0.9,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".animate-featured-header-button",
                start: "top 90%",
                toggleActions: "play none none reset"
            }
        });

        gsap.utils.toArray(".painting").forEach((el, i) => {
            gsap.to(el, {
                opacity: 1,
                y: 0,
                duration: 1.2,
                delay: i * 0.1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%",
                    toggleActions: "play none none reverse",
                },
            });
        });
    });
</script>