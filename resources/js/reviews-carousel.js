import EmblaCarousel from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';

const root = document.querySelector('[data-reviews-carousel]');

if (root) {
    const viewport = root.querySelector('[data-reviews-viewport]');
    const prev = root.querySelector('[data-reviews-prev]');
    const next = root.querySelector('[data-reviews-next]');
    const counter = root.querySelector('[data-reviews-counter]');
    const dotsWrap = root.querySelector('[data-reviews-dots]');
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const embla = EmblaCarousel(viewport, {
        loop: true,
        align: 'start',
    }, [
        Autoplay({
            delay: 4000,
            stopOnInteraction: false,
            stopOnMouseEnter: true,
            playOnInit: !prefersReduced,
        }),
    ]);

    let dotButtons = [];

    prev.addEventListener('click', () => embla.scrollPrev());
    next.addEventListener('click', () => embla.scrollNext());

    const buildDots = () => {
        if (!dotsWrap) {
            return;
        }

        dotsWrap.innerHTML = '';
        dotButtons = embla.scrollSnapList().map((_, index) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'size-2 rounded-full bg-zinc-700 transition hover:bg-amber-400/60 data-[active]:bg-amber-400';
            dot.addEventListener('click', () => embla.scrollTo(index));
            dotsWrap.appendChild(dot);

            return dot;
        });
    };

    const update = () => {
        const index = embla.selectedScrollSnap();

        if (counter) {
            counter.textContent = `${index + 1} / ${embla.scrollSnapList().length}`;
        }

        prev.disabled = !embla.canScrollPrev();
        next.disabled = !embla.canScrollNext();

        dotButtons.forEach((dot, i) => dot.toggleAttribute('data-active', i === index));
    };

    buildDots();
    update();

    embla.on('select', update);
    embla.on('reInit', update);
}