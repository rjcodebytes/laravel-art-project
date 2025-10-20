import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
  const introTitle = document.getElementById("introTitle");
  const artistLines = document.querySelectorAll(".artist-line");

  if (!introTitle || artistLines.length === 0) return;

  // --- Step 1: Hero title entrance ---
  gsap.fromTo(
    introTitle,
    { x: -200, y: 140, opacity: 0, filter: "blur(14px)" },
    { 
      x: 20, 
      y: -20, 
      opacity: 1, 
      filter: "blur(0px)", 
      duration: 1, 
      ease: "power3.out",
      onComplete: () => ScrollTrigger.refresh()
    }
  );

  // --- Step 2: Hero title fade out on scroll ---
  gsap.to(introTitle, {
    y: -60,
    opacity: 0,
    ease: "power2.out",
    scrollTrigger: {
      trigger: introTitle,
      start: "top top",
      end: "bottom top+=50",
      scrub: true,
    }
  });

  // --- Step 3: Prepare artist lines ---
  gsap.set(artistLines, { y: 40, opacity: 0 });

  // --- Step 4: Staggered reveal of artist lines ---
  gsap.to(artistLines, {
    y: 0,
    opacity: 1,
    duration: 0.8,
    stagger: 0.3,
    ease: "power2.out",
    scrollTrigger: {
      trigger: introTitle,
      start: "bottom 70%",
      end: "bottom 30%",
      toggleActions: "play none none reverse",
    }
  });

  // --- Refresh ScrollTrigger on load ---
  window.addEventListener("load", () => ScrollTrigger.refresh());
});
