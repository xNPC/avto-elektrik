<section id="services" class="scroll-mt-20">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Услуги</p>
        <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Чем я занимаюсь</h2>
        <p class="mt-3 max-w-2xl text-zinc-400">
            Основной профиль — автоэлектрика и диагностика. Большинство задач решаю с выездом на место.
        </p>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (config('landing.services') as $service)
                <article data-reveal class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40 hover:bg-zinc-900">
                    <span class="grid size-12 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                        @if ($service['icon'] === 'search')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>
                        @elseif ($service['icon'] === 'battery')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="2" y="7" width="16" height="10" rx="2"/>
                                <path d="M22 11v2"/>
                                <path d="M6 11v2"/>
                                <path d="M10 11v2"/>
                                <path d="M14 11v2"/>
                            </svg>
                        @elseif ($service['icon'] === 'wrench')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                            </svg>
                        @elseif ($service['icon'] === 'bulb')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/>
                                <path d="M9 18h6"/>
                                <path d="M10 22h4"/>
                            </svg>
                        @else
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22v-5"/>
                                <path d="M9 8V2"/>
                                <path d="M15 8V2"/>
                                <path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"/>
                            </svg>
                        @endif
                    </span>
                    <h3 class="mt-4 font-display text-lg font-semibold text-white">{{ $service['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-zinc-400">{{ $service['text'] }}</p>
                </article>
            @endforeach

            <article data-reveal class="rounded-2xl border-2 border-dashed border-zinc-700 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/60">
                <span class="grid size-12 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </span>
                <h3 class="mt-4 font-display text-lg font-semibold text-white">Не нашли свою задачу?</h3>
                <p class="mt-2 text-sm leading-relaxed text-zinc-400">
                    Позвоните — обсудим вашу неисправность и подскажем, чем можем помочь. Выезд по городу и пригороду.
                </p>
                <a href="tel:{{ config('landing.phone_href') }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amber-400 transition hover:text-amber-300">
                    Позвонить
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14"/>
                        <path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </article>
        </div>
    </div>
</section>