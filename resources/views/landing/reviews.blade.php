<section id="reviews" class="scroll-mt-20 border-t border-white/5 bg-zinc-900/30">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Отзывы</p>
        <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Что говорят клиенты</h2>
        <p class="mt-3 max-w-2xl text-zinc-400">
            Отзывы реальных клиентов с Авито — скриншоты добавлю сюда.
        </p>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @for ($i = 0; $i < 3; $i++)
                <div data-reveal class="grid aspect-[4/5] place-items-center rounded-2xl border-2 border-dashed border-zinc-800 bg-zinc-900/40">
                    <span class="flex flex-col items-center gap-3 text-zinc-600">
                        <svg class="size-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/>
                            <circle cx="12" cy="13" r="3"/>
                        </svg>
                        <span class="text-sm">Скриншот отзыва</span>
                    </span>
                </div>
            @endfor
        </div>
    </div>
</section>