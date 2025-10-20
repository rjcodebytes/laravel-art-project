<!-- Add GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<div x-data="{ 
      active: 0, 
      slides: [],
      hasAnimated: false,

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

      updateSlides() {
          // Choose mobile or desktop slides dynamically
          this.slides = window.innerWidth < 768 ? this.mobileSlides : this.desktopSlides;
      }
  }" x-init="
      updateSlides();
      animateOnce();
      setInterval(() => { 
          active = (active + 1) % slides.length; 
      }, 4000);

      // Update slides on window resize
      window.addEventListener('resize', () => {
          updateSlides();
      });
  " class="relative w-full h-screen overflow-hidden rounded-none shadow-lg m-0">

    <!-- dispatch event when active changes -->
    <div x-effect="window.dispatchEvent(new CustomEvent('carousel-active-changed', { detail: active }))"
        style="display:none;"></div>

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="active === index" x-transition.opacity class="absolute inset-0 bg-cover bg-center"
            :style="'background-image: url(' + slide + ')'">
            <img :src="slide" alt="slide image" class="w-full h-full " loading="lazy" decoding="async"
                :data-slide="index">
        </div>
    </template>

    <!-- Black Overlay -->
    <div class="absolute inset-0 bg-black/60 z-10"></div>

    <!-- CTA Buttons -->
    <div
        class="cta-buttons absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-wrap justify-center gap-3 sm:gap-4 z-20 px-4">

        <!-- Enquiry Button -->
        <a href="#" class="inline-block w-full sm:w-auto text-center px-5 sm:px-6 py-2.5 sm:py-3 rounded-md font-medium text-[#e8ded4]
           backdrop-blur-md bg-white/30 border border-white/40
           shadow-md hover:shadow-lg hover:bg-white/40 transition-all duration-300 text-sm sm:text-base">
            Enquiry
        </a>

        <!-- View Collection Button -->
        <a href="#" class="inline-block w-full sm:w-auto text-center px-5 sm:px-6 py-2.5 sm:py-3 rounded-md font-medium text-[#e8ded4]
           backdrop-blur-md bg-[#564b49]/60 border border-white/20
           shadow-md hover:shadow-lg hover:bg-[#564b49]/80 transition-all duration-300 text-sm sm:text-base">
            View Collection
        </a>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof gsap === 'undefined') return;

        // Animate active slide change
        window.addEventListener('carousel-active-changed', (e) => {
            const idx = Number(e.detail);
            const slides = Array.from(document.querySelectorAll('[data-slide]'));
            if (!slides.length || idx < 0 || idx >= slides.length) return;

            const activeSlide = slides[idx];
            const img = activeSlide;
            if (!img) return;

            // Reset styles before animating
            gsap.set(img, { clearProps: 'all' });

            // Smooth cinematic zoom-out
            gsap.fromTo(
                img,
                { scale: 1.15, autoAlpha: 0.85 },
                {
                    scale: 1,
                    autoAlpha: 1,
                    duration: 2.2,
                    ease: "power3.out"
                }
            );
        });

        // Animate first slide on load
        setTimeout(() => {
            window.dispatchEvent(new CustomEvent('carousel-active-changed', { detail: 0 }));
        }, 100);
    });
</script>