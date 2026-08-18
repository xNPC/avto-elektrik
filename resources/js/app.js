import './reviews-carousel';

const revealElements = document.querySelectorAll('[data-reveal]');

if (revealElements.length > 0 && 'IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);

                // После завершения перехода снимаем data-reveal, чтобы не
                // перебивать hover-переходы утилит Tailwind.
                window.setTimeout(() => {
                    entry.target.removeAttribute('data-reveal');
                }, 800);
            });
        },
        { threshold: 0.12 },
    );

    revealElements.forEach((element) => observer.observe(element));
} else {
    revealElements.forEach((element) => element.classList.add('is-visible'));
}