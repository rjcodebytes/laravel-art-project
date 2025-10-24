@extends('layouts.app')
@section('title', 'Enquiry for ' . $painting->title)

@section('content')
    <style>
        /* Gradient Button */
        .contact-btn {
            background: linear-gradient(135deg, #d4b28c 0%, #c79a6d 100%);
            position: relative;
            transition: all 0.4s ease-in-out;
            overflow: hidden;
        }

        .contact-btn::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #c79a6d 0%, #d4b28c 100%);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            z-index: 0;
        }

        .contact-btn:hover::before {
            opacity: 1;
        }

        .contact-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 20px rgba(212, 178, 140, 0.4);
        }

        .contact-btn span {
            position: relative;
            z-index: 1;
        }
    </style>

    <section class="md:p-10 mt-24 md:mt-32 bg-gray-50 min-h-screen overflow-hidden">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden fade-container">
            <div class="grid md:grid-cols-2 gap-8 p-8">

                {{-- LEFT: Painting Details --}}
                <div class="fade-left">
                    <img src="{{ asset('storage/' . $painting->images[0]) }}"
                        class="w-full h-[400px] object-contain rounded-lg border border-gray-300 mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $painting->title }}</h2>
                    <p class="text-gray-500 mt-1 mb-2">{{ $painting->category }} | {{ $painting->medium }}</p>
                </div>

                {{-- RIGHT: Enquiry Form --}}
                <div class="fade-right">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Enquire About This Artwork</h3>

                    @if(session('success'))
                        <div class="bg-green-50 text-green-800 border border-green-200 p-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('enquiry.painting.send', $painting->slug) }}" class="space-y-4">
                        @csrf

                        <div class="fade-up delay-1">
                            <label class="block text-sm font-medium text-gray-700">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-amber-200">
                            @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="fade-up delay-2">
                            <label class="block text-sm font-medium text-gray-700">Mobile Number *</label>
                            <input type="text" name="mobile" value="{{ old('mobile') }}" required
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-amber-200">
                            @error('mobile') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="fade-up delay-3">
                            <label class="block text-sm font-medium text-gray-700">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-amber-200">
                            @error('email') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="fade-up delay-4">
                            <label class="block text-sm font-medium text-gray-700">Message *</label>
                            <textarea name="message" rows="4" required
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-amber-200">{{ old('message') }}</textarea>
                            @error('message') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="fade-up delay-5">
                            <button type="submit"
                                class="contact-btn w-full text-[#1a1817] font-medium py-3 rounded-md transition-all duration-500 shadow-md">
                                <span>Send Enquiry</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- GSAP Animations --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(ScrollTrigger);

            gsap.from(".fade-left", {
                opacity: 0,
                x: -60,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: { trigger: ".fade-left", start: "top 85%" }
            });

            gsap.from(".fade-right", {
                opacity: 0,
                x: 60,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: { trigger: ".fade-right", start: "top 85%" }
            });

            gsap.utils.toArray(".fade-up").forEach((el, i) => {
                gsap.from(el, {
                    opacity: 0,
                    y: 40,
                    duration: 1,
                    delay: i * 0.15,
                    ease: "power2.out",
                    scrollTrigger: { trigger: el, start: "top 90%" }
                });
            });

            gsap.from(".fade-container", {
                opacity: 0,
                scale: 0.95,
                duration: 1.3,
                ease: "power2.out",
            });
        });
    </script>
@endsection
