@extends('layouts.app')
@section('title', 'About')
@section('content')
    <section id="aboutSection" class="p-8 mt-28 md:mt-32 bg-[#e8ded3] min-h-[60vh] md:min-h-[80vh]">
        <div class="container mx-auto flex flex-col lg:flex-row gap-8 items-stretch">
            <!-- Left Image -->
            <div class="flex-1 rounded-xl overflow-hidden shadow-xl left-image h-screen ">
                <img src="{{ asset('images/yashwant-bg.webp') }}" alt="Yashwant Garud"
                    class="w-full h-full min-h-[320px] lg:min-h-full object-cover">
            </div>

            <!-- Right Info -->
            <div class="flex-1 flex flex-col justify-center items-center gap-6">
                <!-- Header -->
                <div>
                    <p class="text-3xl text-[#574c4a] font-bold font-serif tracking-wide mb-1 intro-pre">Hey,</p>
                    <h1 class="text-4xl sm:text-5xl  font-bold text-[#574c4a] mb-4 font-serif intro-heading">I am Yashwant
                        Garud</h1>
                    <p class="text-gray-700 text-base sm:text-lg leading-relaxed">
                        A professional artist from Shendurni, near the world-famous Ajanta
                        Caves in Maharashtra.
                        My work is inspired by Ajanta-style paintings, blending traditional craftsmanship with contemporary
                        presentation.
                        Trained at Khiroda School of Art and Abhinav Kala Mahavidyalaya, Pune, I specialize in recreating
                        and preserving the intricate storytelling and vibrant colors of Ajanta through modern mediums,
                        reflecting a deep respect for India’s cultural heritage.
                    </p>
                </div>
                <!-- Expertise Boxes -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mt-6">
                    <div class="bg-white rounded-lg p-4 flex flex-col gap-2 hover:shadow-lg transition">
                        <p class="font-semibold text-[#574c4a]">Ajanta-Style Painting</p>
                        <p class="text-gray-600 text-sm">Specializes in recreating and preserving the intricate storytelling
                            and colors of Ajanta paintings.</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 flex flex-col gap-2 hover:shadow-lg transition">
                        <p class="font-semibold text-[#574c4a]">Contemporary Adaptation</p>
                        <p class="text-gray-600 text-sm">Blends traditional craftsmanship with modern techniques and
                            presentation.</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 flex flex-col gap-2 hover:shadow-lg transition">
                        <p class="font-semibold text-[#574c4a]">Art Education & Training</p>
                        <p class="text-gray-600 text-sm">Trained at Khiroda School of Art and Abhinav Kala Mahavidyalaya,
                            Pune.</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 flex flex-col gap-2 hover:shadow-lg transition">
                        <p class="font-semibold text-[#574c4a]">Cultural Heritage Preservation</p>
                        <p class="text-gray-600 text-sm">Works with devotion to keep India’s artistic heritage alive through
                            paintings and modern mediums.</p>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    @vite(['resources/js/about-animations.js'])

    <section class="relative bg-center py-10 m-5 md:m-10 rounded-3xl text-white" style="background-image: url('/images/artist-banner2.png');">
        <div class="absolute inset-0 bg-black/20 rounded-3xl"></div>

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
                class=" inline-block bg-[#d4b28c] hover:bg-[#c19a74] text-[#1a1817] font-semibold text-lg px-8 py-4 rounded-full shadow-lg transition transform hover:-translate-y-1">
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
                },
            });
        });
    </script>

@endsection