<section id="reviews" class="scroll-mt-20 border-t border-white/5 bg-zinc-900/30">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p data-reveal class="text-sm font-semibold uppercase tracking-widest text-amber-400">Отзывы</p>
        <h2 data-reveal class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Что говорят клиенты</h2>
        <p data-reveal class="mt-3 max-w-2xl text-zinc-400">
            Скриншоты реальных отзывов с Авито — как клиенты оценивают мою работу.
        </p>

        <div data-reviews-carousel class="mt-12">
            <div data-reviews-viewport class="overflow-hidden rounded-3xl [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <div class="flex touch-pan-y">
                    @foreach (config('landing.reviews') as $review)
                        @php
                            $reviewUrl = asset('images/reviews/'.$review['src']).'?v='.filemtime(public_path('images/reviews/'.$review['src']));
                        @endphp
                        <div class="min-w-0 shrink-0 basis-full px-2.5 sm:basis-1/2 lg:basis-1/3">
                            <div class="grid h-64 place-items-center rounded-2xl bg-white shadow-xl shadow-black/30 ring-1 ring-white/10">
                                <img
                                    src="{{ $reviewUrl }}"
                                    alt="Отзыв клиента с Авито"
                                    width="{{ $review['w'] }}"
                                    height="{{ $review['h'] }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="max-h-full max-w-full w-auto"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 flex items-center justify-center gap-4">
                <button
                    type="button"
                    data-reviews-prev
                    aria-label="Предыдущий отзыв"
                    class="grid size-10 place-items-center rounded-full border border-white/10 bg-zinc-900/60 text-zinc-400 transition hover:border-amber-400/40 hover:text-amber-400 disabled:opacity-40"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </button>

                <span data-reviews-counter class="min-w-16 text-center text-sm tabular-nums text-zinc-400" aria-live="polite">1 / {{ count(config('landing.reviews')) }}</span>

                <button
                    type="button"
                    data-reviews-next
                    aria-label="Следующий отзыв"
                    class="grid size-10 place-items-center rounded-full border border-white/10 bg-zinc-900/60 text-zinc-400 transition hover:border-amber-400/40 hover:text-amber-400 disabled:opacity-40"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </button>
            </div>

            <div data-reviews-dots class="mt-5 hidden flex-wrap items-center justify-center gap-2.5 sm:flex" aria-hidden="true"></div>
        </div>
    </div>
</section>