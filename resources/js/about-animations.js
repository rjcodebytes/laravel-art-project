// resources/js/about-animations.js
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

function safeQuery(selector) {
  try { return document.querySelector(selector); } catch { return null; }
}

function safeQueryAll(selector) {
  try { return Array.from(document.querySelectorAll(selector)); } catch { return []; }
}

function initExhibitions() {
  const section = document.getElementById('exhibitions');
  if (!section) {
    console.debug('[GSAP] #exhibitions not found — skipping exhibitions animation.');
    return;
  }

  // select items: images and iframes inside the section
  const items = Array.from(section.querySelectorAll('h2,img, iframe, video, .collage-tile'));
  if (!items.length) {
    console.debug('[GSAP] No img/iframe/video found inside #exhibitions — skipping.');
    return;
  }

  // animate each tile when it enters viewport (trigger per element for better UX)
  items.forEach((el, i) => {
    gsap.from(el, {
      opacity: 0,
      y: 36,
      scale: 1.02,
      duration: 1,
      ease: 'power3.out',
      delay: 0,
      scrollTrigger: {
        trigger: el,
        start: 'top 90%',
        toggleActions: 'play none none reset',
        // markers: true,
      }
    });
  });

  console.debug('[GSAP] Exhibitions animations initialized for', items.length, 'items');
}

function initBanner() {
  // flexible selector: prefer .artist-banner class; fallback to style attribute check
  const banner = safeQuery('.artist-banner') || safeQuery("section[style*='artist-banner']") || safeQuery('[data-artist-banner]');
  if (!banner) {
    console.debug('[GSAP] Artist banner not found — skipping banner animations.');
    return;
  }

  const h2 = banner.querySelector('h2');
  const p = banner.querySelector('p');
  const cta = banner.querySelector('a');

  if (h2) {
    gsap.from(h2, {
      opacity: 0, y: 40, duration: 1, ease: 'power3.out',
      scrollTrigger: { trigger: banner, start: 'top 80%', toggleActions: 'play none none reset' }
    });
  }
  if (p) {
    gsap.from(p, {
      opacity: 0, y: 30, duration: 1, delay: 0.25, ease: 'power3.out',
      scrollTrigger: { trigger: banner, start: 'top 80%', toggleActions: 'play none none reset' }
    });
  }
  if (cta) {
    gsap.from(cta, {
      opacity: 0, y: 20, duration: 0.9, delay: 0.45, ease: 'power3.out',
      scrollTrigger: { trigger: banner, start: 'top 80%', toggleActions: 'play none none reset' }
    });
  }

  console.debug('[GSAP] Banner animations initialized');
}

function initAboutTimeline() {
  const section = document.getElementById('aboutSection');
  if (!section) {
    console.debug('[GSAP] aboutSection not found — skipping about timeline.');
    return;
  }

  const img = section.querySelector('.left-image img');
  const introPre = section.querySelector('.intro-pre') || section.querySelector('p.text-4xl'); // explicitly target "Hey,"
  const heading = section.querySelector('.intro-heading') || section.querySelector('h1');
  const accentLine = section.querySelector('.accent-line');

  // ✅ Select all <p> tags inside .about-text EXCEPT the first one ("Hey,")
  const allParagraphs = Array.from(section.querySelectorAll('.about-text p'));
  const paragraphs = allParagraphs.filter(p => p !== introPre);

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: 'top 85%',
      toggleActions: 'play none none reset'
    }
  });

  // 👇 Sequence order: image -> "Hey," -> name -> line -> paragraphs
  if (img)
    tl.from(img, { y: 28, scale: 1.06, opacity: 0, duration: 1, ease: 'power3.out' }, 0.05);

  if (introPre)
    tl.from(introPre, { y: 18, opacity: 0, duration: 0.55, ease: 'power3.out' }, 0.3);

  if (heading)
    tl.from(heading, { y: 18, opacity: 0, duration: 0.7, ease: 'power3.out' }, 0.45);

  if (accentLine)
    tl.from(accentLine, { scaleX: 0, transformOrigin: 'left center', opacity: 0, duration: 0.6, ease: 'power2.out' }, 0.6);

  if (paragraphs.length)
    tl.from(paragraphs, {
      y: 20,
      opacity: 0,
      stagger: 0.12,
      duration: 0.7,
      ease: 'power2.out'
    }, 0.75);

  console.debug('[GSAP] About timeline initialized (fixed version)');
}

function initSplashHover() {
  const aboutBg = document.getElementById('aboutSection');
  if (!aboutBg) return;

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
  aboutBg.addEventListener('mouseenter', (e) => { onMove(e); aboutBg.classList.add('splash-active'); }, { passive: true });
  aboutBg.addEventListener('mouseleave', () => { aboutBg.classList.remove('splash-active'); aboutBg.style.setProperty('--splash-pos', '50% 50%'); }, { passive: true });

  console.debug('[GSAP] Splash hover initialized');
}

// Wait for DOM, then init everything
function initAll() {
  initExhibitions();
  initBanner();
  initAboutTimeline();
  initSplashHover();

  // refresh after load/images to ensure ScrollTrigger calculates right sizes
  window.addEventListener('load', () => {
    try { ScrollTrigger.refresh(); console.debug('[GSAP] ScrollTrigger refreshed on load'); } catch (e) {}
  });

  // also attempt quick refresh after a short delay (useful when Vite HMR or lazy image loading)
  setTimeout(() => { try { ScrollTrigger.refresh(); } catch (e) {} }, 800);
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initAll);
} else {
  initAll();
}
