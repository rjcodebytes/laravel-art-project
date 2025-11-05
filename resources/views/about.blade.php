@extends('layouts.app')
@section('title', 'About Yashwant Garud - Indian Artist Inspired by Ajanta Caves')
@section('meta_description', 'Learn about Yashwant Garud, a professional artist from Shendurni, whose works revive the spirit of Ajanta through devotion, research, and contemporary expression.')
@section('meta_keywords', 'about artist, Yashwant Garud biography, Ajanta cave art, Indian painter, traditional art, heritage preservation, fine artist')

@section('content')
    <style>
        /* 🌆 Dark brown gradient background with cream-brown splash */
        .about-gradient-bg {
            position: relative;
            overflow: hidden;
            color: #f3e9dd;
            background: linear-gradient(135deg, #3c2f2f 0%, #4b3621 50%, #2d1f16 100%);
        }

        /* Splash highlight overlay */
        .about-gradient-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 2;
            /* 👈 ensures it appears above background, but under text */
            pointer-events: none;
            transition: opacity 0.45s ease, transform 0.7s cubic-bezier(.2, .9, .2, 1);
            opacity: 0;
            transform: scale(0.95);
            background: radial-gradient(circle at var(--splash-pos, 50% 50%),
                    rgba(255, 230, 200, 0.35) 0%,
                    rgba(230, 200, 170, 0.10) 25%,
                    rgba(0, 0, 0, 0) 60%);
            mix-blend-mode: overlay;
        }

        .about-gradient-bg.splash-active::before {
            opacity: 1;
            transform: scale(1.1);
        }

        /* Content wrapper above splash */
        .about-gradient-bg>* {
            position: relative;
            z-index: 5;
        }


        /* Image shadow enhancement */
        .left-image img {
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3);
            border-radius: 1rem;
            transition: transform 0.6s ease;
        }

        /* Paragraph styling */
        .about-text {
            color: #f5e9d7;
            font-size: 1.05rem;
            line-height: 1.8;
            letter-spacing: 0.2px;
        }

        /* Accent line under name */
        .accent-line {
            width: 60px;
            height: 3px;
            background-color: #d4b28c;
            margin-top: 0.5rem;
            border-radius: 2px;
        }
    </style>

    <section id="aboutSection" class="about-gradient-bg p-8 mt-28 md:mt-26 min-h-[70vh] md:min-h-[85vh] flex items-center">
        <div class="container mx-auto flex flex-col lg:flex-row gap-10 items-center relative z-10">
            <!-- Left Image -->
            <div class="flex-1 left-image md:relative md:bottom-20">
                <img src="{{ asset('images/yashwant-bg.webp') }}" alt="Yashwant Garud"
                    class="w-full h-auto rounded-xl object-cover">
            </div>

            <!-- Right Info -->
            <div class="flex-1 flex flex-col justify-center gap-4 about-text">
                <p class="text-4xl text-[#f3e9dd] font-bold font-serif ">Hey,</p>
                <h1 class="text-4xl sm:text-5xl font-bold text-[#f3e9dd] mb-2 font-serif intro-heading">
                    I am Yashwant Garud
                </h1>
                <div class="accent-line"></div>

                <p class="mt-6">
                    I am a professional artist from Shendurni, a town located near the world-famous Ajanta Caves in
                    Maharashtra.
                    Growing up close to this heritage site has had a lasting influence on my artistic perspective and
                    thematic choices.
                </p>
                <p>
                    I pursued my formal art education at the Khiroda School of Art, completing the Foundation Course in Fine
                    Arts,
                    followed by an Art Teacher’s Diploma (A.T.D.) and a G.D. Art (Commercial) degree from Abhinav Kala
                    Mahavidyalaya, Pune.
                    These academic foundations provided a strong base in technique, composition, and applied art principles.
                </p>
                <p>
                    Living close to Ajanta naturally drew me to the timeless beauty of its cave paintings. Their colors,
                    emotions,
                    and intricate storytelling continue to inspire my work. Over the years, I have focused extensively on
                    researching,
                    studying, and recreating Ajanta-style paintings, blending traditional craftsmanship with contemporary
                    presentation.
                    My work reflects a deep respect for India’s cultural heritage and aims to preserve the artistic
                    excellence of
                    the Ajanta paintings through modern mediums.
                </p>
                <p>
                    My journey as an artist is guided by patience, devotion, and a constant dialogue between heritage and
                    modernity.
                    Every painting I create is a humble attempt to keep that dialogue alive, to let the art of the past
                    continue
                    to breathe through the present.
                </p>
            </div>
        </div>
    </section>


    <section id="exhibitions" class=" text-white py-16 md:py-10 overflow-hidden">
        <div class="max-w-5xl mx-auto px-6 md:px-10">
            <h2 class="text-center text-3xl sm:text-4xl md:text-5xl font-serif font-bold text-[#574c4a] mb-8">
                Exhibitions & Media Coverage
            </h2>

            <!-- Collage Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 auto-rows-[600px] md:auto-rows-[558px]">
                <!-- LEFT SIDE (3 stacked images) -->
                <div class="grid grid-rows-3 gap-4 md:gap-6">
                    <div class="overflow-hidden rounded-xl group">
                        <img src="{{ asset('images/exhibitions/ex1.jpg') }}" alt="Exhibition 1"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out" />
                    </div>

                    <div class="overflow-hidden rounded-xl group">
                        <img src="{{ asset('images/exhibitions/ex2.jpg') }}" alt="Exhibition 2"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out" />
                    </div>

                    <div class="overflow-hidden rounded-xl group">
                        <img src="{{ asset('images/exhibitions/ex3.jpg') }}" alt="Exhibition 3"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out" />
                    </div>
                </div>

                <!-- RIGHT SIDE (2 newspaper + 1 video) -->
                <div class="grid grid-rows-3 gap-4 md:gap-6">
                    <div class="grid grid-cols-2 gap-4 md:gap-6 row-span-1">
                        <div class="overflow-hidden rounded-xl group">
                            <img src="{{ asset('images/exhibitions/ex4.jpg') }}" alt="News 1"
                                class="w-full h-full transform group-hover:scale-110 transition duration-700 ease-out" />
                        </div>
                        <div class="overflow-hidden rounded-xl group">
                            <img src="{{ asset('images/exhibitions/ex5.jpg') }}" alt="News 2"
                                class="w-full h-full transform group-hover:scale-110 transition duration-700 ease-out" />
                        </div>
                    </div>

                    <div class="row-span-2 overflow-hidden rounded-xl relative bg-[#2e2a28] aspect-video">
                        <iframe class="absolute inset-0 w-full h-full rounded-xl"
                            src="https://www.youtube.com/embed/KJNWuVwRPS8?autoplay=0&mute=1&rel=0&playsinline=1"
                            title="Exhibition Video" frameborder="0" loading="lazy"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
                        </iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @vite(['resources/js/about-animations.js'])

    <!-- Quote Section -->
    <section class="relative m-5 md:m-10 rounded-3xl -bg-[position:center_70%] bg-cover bg-no-repeat py-12 text-white"
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
            // Quote section animations
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

            // Splash hover effect: set combined --splash-pos and throttle updates with rAF
            const aboutBg = document.getElementById('aboutSection');
            if (aboutBg) {
                let raf = null;
                function onMove(e) {
                    if (raf) cancelAnimationFrame(raf);
                    raf = requestAnimationFrame(() => {
                        const rect = aboutBg.getBoundingClientRect();
                        const x = Math.max(0, Math.min(100, ((e.clientX - rect.left) / rect.width) * 100));
                        const y = Math.max(0, Math.min(100, ((e.clientY - rect.top) / rect.height) * 100));
                        aboutBg.style.setProperty('--splash-pos', `${x}% ${y}%`);
                        raf = null;
                    });
                }

                aboutBg.addEventListener('mousemove', onMove, { passive: true });
                aboutBg.addEventListener('mouseenter', (e) => {
                    // position immediately on enter
                    onMove(e);
                    aboutBg.classList.add('splash-active');
                }, { passive: true });
                aboutBg.addEventListener('mouseleave', () => {
                    aboutBg.classList.remove('splash-active');
                    // optional: cleanup position
                    aboutBg.style.setProperty('--splash-pos', `50% 50%`);
                }, { passive: true });
            }
        });
    </script>
@endsection