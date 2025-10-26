<section class="relative m-5 md:m-10 rounded-3xl bg-center py-12 text-white "
    style="background-image: url('/images/artist-banner2.png');">
    <div class="absolute rounded-3xl inset-0 bg-black/20"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl sm:text-5xl font-extrabold font-serif mb-6 tracking-wide">
            “Every brushstroke tells a story, and every color speaks a feeling.”
        </h2>
        <p class="text-lg sm:text-xl text-gray-200 mb-10 leading-relaxed">
            As a professional artist, I aim to bring emotions to life through art.
            Whether you’re looking for custom portrait commissions or large-scale
            wall paintings, I’d love to collaborate and create something meaningful with you.
        </p>

        <a href="{{ url('/contact') }}"
            class=" inline-block bg-[#d4b28c] hover:bg-[#c19a74] active:bg-[#c19a74] text-[#1a1817] font-semibold text-lg px-8 py-4 rounded-full shadow-lg transition transform hover:-translate-y-1 active:-translate-y-1">
            Enquire Now
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