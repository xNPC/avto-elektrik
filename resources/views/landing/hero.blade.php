<section id="top" class="relative overflow-hidden">
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(251,191,36,0.14),transparent_60%)]"></div>
    <div
        class="pointer-events-none absolute inset-0 opacity-[0.06]"
        style="background-image: linear-gradient(to right, rgb(255 255 255 / 0.5) 1px, transparent 1px), linear-gradient(to bottom, rgb(255 255 255 / 0.5) 1px, transparent 1px); background-size: 56px 56px;"
    ></div>
    <svg class="pointer-events-none absolute -right-8 top-1/2 hidden -translate-y-1/2 text-amber-400 animate-bolt-breathe lg:block" width="380" height="520" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/>
    </svg>

    <div class="relative mx-auto max-w-6xl px-4 pb-20 pt-16 sm:px-6 sm:pt-24">
        <div class="max-w-3xl">
            <p class="inline-flex items-center gap-2 rounded-full border border-amber-400/30 bg-amber-400/10 px-4 py-1.5 text-sm font-medium text-amber-300">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                Выезд по {{ config('landing.city') }}
            </p>

            <h1 class="mt-6 font-display text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">
                Автоэлектрик<br>
                с выездом <span class="text-amber-400">на место</span>
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-zinc-400">
                Диагностика и ремонт электрооборудования легковых и грузовых автомобилей, спецтехники.
                Найду и устраню любую неисправность — от «пропала искра» до сложных отказов электроники.
                Работаю на месте или в мастерской.
            </p>

            <div class="mt-9 flex flex-wrap items-center gap-4">
                <a
                    href="tel:{{ config('landing.phone_href') }}"
                    class="inline-flex items-center gap-2.5 rounded-lg bg-amber-400 px-7 py-3.5 text-base font-semibold text-zinc-950 shadow-lg shadow-amber-400/20 transition hover:bg-amber-300"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    Позвонить
                </a>
                <a
                    href="{{ config('landing.max') }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-2.5 rounded-lg border border-[#471AFF]/40 px-7 py-3.5 text-base font-semibold text-[#b9a9ff] transition hover:border-[#471AFF] hover:bg-[#471AFF] hover:text-white"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>
                    </svg>
                    Написать в MAX
                </a>
            </div>

            <div class="mt-10 flex flex-wrap gap-3">
                <span class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-zinc-900 px-4 py-2 text-sm text-zinc-300">
                    <svg class="size-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                        <circle cx="7" cy="17" r="2"/>
                        <path d="M9 17h6"/>
                        <circle cx="17" cy="17" r="2"/>
                    </svg>
                    Легковые
                </span>
                <span class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-zinc-900 px-4 py-2 text-sm text-zinc-300">
                    <svg class="size-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/>
                        <path d="M15 18H9"/>
                        <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14"/>
                        <circle cx="17" cy="18" r="2"/>
                        <circle cx="7" cy="18" r="2"/>
                    </svg>
                    Грузовые
                </span>
                <span class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-zinc-900 px-4 py-2 text-sm text-zinc-300">
                    <svg class="size-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="3.5"/>
                        <circle cx="12" cy="12" r="8" stroke-dasharray="3.2 3.2"/>
                    </svg>
                    Спецтехника
                </span>
            </div>
        </div>
    </div>
</section>