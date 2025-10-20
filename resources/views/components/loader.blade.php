<!-- Loader Component -->
<div x-data="{ show: true, leaving: false }"
  x-init="setTimeout(() => { leaving = true; setTimeout(() => show = false, 1500); }, 2000)" x-show="show"
  x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0" :class="{ 'leaving': leaving }"
  class="fixed inset-0 z-50 flex items-center justify-center bg-transparent overflow-hidden" aria-hidden="true">
  <!-- SVG panels (responsive, always a perfect diagonal) -->
  <svg class="absolute inset-0 w-full h-full loader-svg" viewBox="0 0 100 100" preserveAspectRatio="none"
    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <!-- left triangle: top-left -> top-right -> bottom-left -->
    <polygon :class="['loader-panel left-panel', leaving ? 'leave-left' : '']" points="0,0 100,0 0,100" />
    <!-- right triangle: top-right -> bottom-right -> bottom-left -->
    <polygon :class="['loader-panel right-panel', leaving ? 'leave-right' : '']" points="100,0 100,100 0,100" />
  </svg>

  <!-- Centered branding/content -->
  <div class="relative z-10 text-center pointer-events-none loader-content px-4">
    <h1 class="text-5xl sm:text-6xl font-serif text-[#d1c6bc] tracking-wide mb-2">Yashwant Garud</h1>
    <p class="text-sm sm:text-base text-gray-300 font-light tracking-widest">Unfolding Imagination...</p>
  </div>
</div>

<!-- Styles (put in component CSS / <style> or your global CSS) -->
<style>
  /* SVG + panel base */
  .loader-svg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
  }

  /* shared panel style */
  .loader-panel {
    transition: transform 1400ms cubic-bezier(.2, .9, .3, 1), opacity 1400ms ease;
    transform-origin: 50% 50%;
  }

  /* colors (change as you like) */
  .left-panel {
    fill: #7e6a67;
  }

  .right-panel {
    fill: #4b3c3a;
  }

  /* leave transforms: slide each triangle fully off-screen (keeps diagonal edge) */
  .leave-left {
    transform: translate(-120%, -10%) rotate(-12deg);
    opacity: 0;
  }

  .leave-right {
    transform: translate(120%, 10%) rotate(12deg);
    opacity: 0;
  }

  /* content (brand) fade/scale while leaving */
  .loader-content {
    transition: transform 1100ms ease, opacity 1100ms ease;
  }

  .leaving .loader-content {
    transform: scale(.96);
    opacity: 0;
  }

  /* small responsive tweaks */
  @media (max-width: 640px) {
    .loader-content h1 {
      font-size: 2.25rem;
    }

    /* text-4xl-ish */
    .loader-content p {
      font-size: 0.85rem;
    }
  }
</style>