import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

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

function initAboutAnimations() {
    const section = document.getElementById('aboutSection');
    if (!section) return;

    // create timeline that plays when section enters viewport
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: "top 85%",
            toggleActions: "play none none reset"
        }
    });

    // selectors (safe queries)
    const img = section.querySelector('.left-image img') || section.querySelector('img');
    const pre = section.querySelector('.intro-pre') || section.querySelector('p');
    const heading = section.querySelector('.intro-heading') || section.querySelector('h1');
    const desc = section.querySelector('.flex-1 > div > p.text-gray-700') || section.querySelector('p.text-gray-700');
    // robust boxes selector: prefer .feature-boxes, fallback to direct grid children
    const boxesNodeList = section.querySelectorAll('.feature-boxes > div, .grid > .bg-white, .grid > div');
    const boxes = Array.from(boxesNodeList).filter(Boolean);
    const ctasNodeList = section.querySelectorAll('.cta-buttons a, .flex > a');
    const ctas = Array.from(ctasNodeList).filter(Boolean);

    // build timeline with small delays/staggers
    if (img) tl.from(img, { y: 30, scale: 1.06, opacity: 0, duration: 0.9, ease: 'power3.out' }, 0.12);
    if (pre) tl.from(pre, { y: 18, opacity: 0, duration: 0.5 }, 0.3);
    if (heading) tl.from(heading, { y: 22, opacity: 0, duration: 0.7 }, 0.45);
    if (desc) tl.from(desc, { y: 18, opacity: 0, duration: 0.7 }, 0.65);

    // Use fromTo for boxes so start/end states are explicit and consistent
    if (boxes.length) {
        tl.fromTo(boxes,
            { y: 24, opacity: 0 },
            { y: 0, opacity: 1, stagger: 0.12, duration: 0.7, ease: 'power2.out' },
            0.95
        );
    }

    if (ctas.length) {
        tl.fromTo(ctas,
            { y: 18, opacity: 0 },
            { y: 0, opacity: 1, stagger: 0.14, duration: 0.6, ease: 'power2.out' },
            1.3
        );
    }

    // refresh measurements after all images loaded
    window.addEventListener('load', () => ScrollTrigger.refresh());
}

// init on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAboutAnimations);
} else {
    initAboutAnimations();
}
