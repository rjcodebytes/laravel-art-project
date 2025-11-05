<section class=" m-5 rounded-3xl -bg-[position:center_70%] bg-cover bg-no-repeat py-12 text-white "
    style="background-image: url('/images/artist-banner3.png');">
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl sm:text-5xl font-extrabold font-serif mb-6 tracking-wide">
            The Walls of Ajanta Whisper Stories
        </h2>
        <p class="text-lg sm:text-xl text-gray-200 mb-10 leading-relaxed">
            My art draws life from the Ajanta Caves — a world of timeless colors, emotions,
            and divine stories. From recreating ancient murals to crafting custom artworks
            that echo India’s cultural essence — every painting tells a story waiting to live
            on your walls.
        </p>

        <a href="{{ url('/contact') }}"
            class="group inline-flex items-center justify-center bg-[#d4b28c] hover:bg-[#c19a74] active:bg-[#c19a74] text-[#1a1817] font-semibold text-sm md:text-lg px-8 py-4 rounded-full shadow-lg transition transform hover:-translate-y-1 active:-translate-y-1">

            <span class="transition-transform duration-300">Acquire Ajanta’s Enduring Artistry</span>

            <i
                class="fa-solid fa-arrow-right fa-sm ml-2 transform -translate-x-0 -rotate-45 transition-all duration-300 group-hover:translate-x-1 group-hover:rotate-0 group-active:translate-x-1 group-active:rotate-0">
            </i>
        </a>
    </div>
</section>

<!-- GSAP Animation -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.from("section[style*='artist-banner'] h2", {
            opacity: 0,
            y: 40,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: "section[style*='artist-banner']",
                start: "top 80%",
                toggleActions: "play none none reset"
            },
        });

        gsap.from("section[style*='artist-banner'] p", {
            opacity: 0,
            y: 30,
            duration: 1,
            delay: 0.3,
            ease: "power3.out",
            scrollTrigger: {
                trigger: "section[style*='artist-banner']",
                start: "top 80%",
                toggleActions: "play none none reset"
            },
        });

        gsap.from("section[style*='artist-banner'] a", {
            opacity: 0,
            y: 20,
            duration: 1,
            delay: 0.6,
            ease: "power3.out",
            scrollTrigger: {
                trigger: "section[style*='artist-banner']",
                start: "top 80%",
                toggleActions: "play none none reset"
            },
        });
    });
</script>