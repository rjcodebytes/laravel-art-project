<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<div x-data="{ 
      active: 0, 
      slides: [],
      hasAnimated: false,
      isLoaded: false, // preload flag

      desktopSlides: [
          '/images/i1.webp',
          '/images/i2.webp',
          '/images/i3.webp'
      ],
      mobileSlides: [
          '/images/mi1.webp',
          '/images/mi2.webp',
          '/images/mi3.webp'
      ],

      // preload all images
      async preloadImages(list) {
          const promises = list.map(src => 
              new Promise((resolve, reject) => {
                  const img = new Image();
                  img.src = src;
                  img.onload = resolve;
                  img.onerror = reject;
              })
          );
          await Promise.all(promises);
          this.isLoaded = true;
      },

      animateOnce() {
          if (this.hasAnimated) return;
          this.hasAnimated = true;

          // Entry fade animation for buttons
          setTimeout(() => {
              gsap.fromTo('.cta-buttons a', 
                  { y: 20, opacity: 0 }, 
                  { y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: 'power3.out' }
              );
          }, 2000);
      },

      async updateSlides() {
          this.slides = window.innerWidth < 768 ? this.mobileSlides : this.desktopSlides;
          await this.preloadImages(this.slides); // wait for preload
      }
  }" x-init="
      await updateSlides();
      animateOnce();
      setInterval(() => { 
          if (isLoaded) active = (active + 1) % slides.length; 
      }, 7000); // 7s per slide

      window.addEventListener('resize', async () => {
          await updateSlides();
      });
  " class="relative w-full h-screen overflow-hidden bg-black rounded-none shadow-lg m-0">

    <!-- dispatch event when active changes -->
    <div x-effect="if(isLoaded) window.dispatchEvent(new CustomEvent('carousel-active-changed', { detail: active }))"
        style="display:none;"></div>

    <!-- Loading Overlay -->
    <div x-show="!isLoaded"
        class="absolute inset-0 flex items-center justify-center bg-black/80 text-white text-lg z-30">
        Loading images...
    </div>

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="active === index && isLoaded" class="absolute inset-0 bg-cover bg-center will-change-transform"
            :style="'background-image: url(' + slide + ');'" :data-slide="index">
            <img :src="slide" alt="slide image" class="w-full h-full object-cover" loading="eager" decoding="sync">
        </div>
    </template>

    <!-- Black Overlay -->
    <div class="absolute inset-0 bg-black/60 z-10"></div>

    <!-- CTA Buttons -->
    <div
        class="cta-buttons absolute bottom-10 md:bottom-20 left-1/2 -translate-x-1/2 flex flex-wrap justify-center gap-3 sm:gap-4 z-20 px-4">

        <!-- Enquiry Button -->
        <a href="{{ route('contact.show') }}"
            class="group inline-flex items-center justify-center gap-2 w-full sm:w-auto text-center px-5 sm:px-6 py-2.5 sm:py-3 rounded-md font-semibold text-[#e8ded4]
       backdrop-blur-md bg-white/30 
       shadow-md hover:shadow-lg active:shadow-lg hover:bg-white/40 active:bg-white/40 transition-all duration-300 text-sm sm:text-base">
            Enquiry
            <i
                class="fa-solid fa-arrow-right fa-sm transition-transform duration-300 group-hover:translate-x-1 -rotate-45"></i>
        </a>

        <!-- View Collection Button -->
        <a href="{{ route('collection.index') }}"
            class="group inline-flex items-center justify-center gap-2 w-full sm:w-auto text-center px-5 sm:px-6 py-2.5 sm:py-3 rounded-md font-semibold text-[#e8ded4]
       backdrop-blur-md bg-[#564b49]/60  
       shadow-md hover:shadow-lg active:shadow-lg hover:bg-[#564b49]/80 active:bg-[#564b49]/80 transition-all duration-300 text-sm sm:text-base">
            View Collection
            <i
                class="fa-solid fa-arrow-right fa-sm transition-transform duration-300 group-hover:translate-x-1 -rotate-45"></i>
        </a>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof gsap === 'undefined') return;

        let prevSlide = null;

        window.addEventListener('carousel-active-changed', (e) => {
            const idx = Number(e.detail);
            const slides = Array.from(document.querySelectorAll('[data-slide]'));
            if (!slides.length || idx < 0 || idx >= slides.length) return;

            const activeSlide = slides[idx];
            const prev = prevSlide;
            prevSlide = activeSlide;

            // Reset Z-index for proper layering
            slides.forEach(slide => gsap.set(slide, { zIndex: 0 }));
            gsap.set(activeSlide, { zIndex: 2 });
            if (prev) gsap.set(prev, { zIndex: 1 });

            // Prepare incoming slide
            gsap.set(activeSlide, { x: '100%', autoAlpha: 1 });

            // Timeline for smooth simultaneous motion
            const tl = gsap.timeline({ defaults: { duration: 2.8, ease: 'power3.inOut' } });

            if (prev && prev !== activeSlide) {
                tl.to(prev, { x: '-100%', autoAlpha: 1 }, 0);
            }
            tl.to(activeSlide, { x: '0%', autoAlpha: 1 }, 0);
        });

        // Trigger first slide after short delay
        setTimeout(() => {
            window.dispatchEvent(new CustomEvent('carousel-active-changed', { detail: 0 }));
        }, 200);
    });
</script>