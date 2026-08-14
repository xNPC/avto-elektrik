<header class="sticky top-0 z-50 border-b border-white/5 bg-zinc-950/80 backdrop-blur-lg">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">
        <a href="#top" class="flex items-center gap-3">
            <span class="grid size-9 place-items-center rounded-lg bg-amber-400 text-zinc-950">
                <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/>
                </svg>
            </span>
            <span class="leading-tight">
                <span class="block font-display text-sm font-bold tracking-wide text-white">АВТОЭЛЕКТРИК</span>
                <span class="block text-xs text-zinc-400">частный мастер · {{ config('landing.city') }}</span>
            </span>
        </a>

        <nav class="hidden items-center gap-8 text-sm font-medium text-zinc-300 lg:flex">
            <a href="#services" class="transition hover:text-amber-400">Услуги</a>
            <a href="#about" class="transition hover:text-amber-400">Обо мне</a>
            <a href="#areas" class="transition hover:text-amber-400">Районы</a>
            <a href="#works" class="transition hover:text-amber-400">Работы</a>
            <a href="#contacts" class="transition hover:text-amber-400">Контакты</a>
        </nav>

        <div class="flex items-center gap-3">
            <a
                href="tel:{{ config('landing.phone_href') }}"
                class="hidden items-center gap-2 rounded-lg bg-amber-400 px-4 py-2 text-sm font-semibold text-zinc-950 transition hover:bg-amber-300 md:inline-flex"
            >
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                {{ config('landing.phone') }}
            </a>

            <details class="group relative lg:hidden">
                <summary class="grid size-10 cursor-pointer list-none place-items-center rounded-lg border border-white/10 text-zinc-300 transition hover:text-amber-400 [&::-webkit-details-marker]:hidden">
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </summary>
                <div class="absolute right-0 mt-2 w-64 rounded-2xl border border-white/10 bg-zinc-900 p-2 shadow-2xl">
                    <a href="#services" class="block rounded-lg px-4 py-2.5 text-sm text-zinc-300 transition hover:bg-white/5 hover:text-amber-400">Услуги</a>
                    <a href="#about" class="block rounded-lg px-4 py-2.5 text-sm text-zinc-300 transition hover:bg-white/5 hover:text-amber-400">Обо мне</a>
                    <a href="#areas" class="block rounded-lg px-4 py-2.5 text-sm text-zinc-300 transition hover:bg-white/5 hover:text-amber-400">Районы</a>
                    <a href="#works" class="block rounded-lg px-4 py-2.5 text-sm text-zinc-300 transition hover:bg-white/5 hover:text-amber-400">Работы</a>
                    <a href="#contacts" class="block rounded-lg px-4 py-2.5 text-sm text-zinc-300 transition hover:bg-white/5 hover:text-amber-400">Контакты</a>
                    <div class="my-2 border-t border-white/10"></div>
                    <a href="tel:{{ config('landing.phone_href') }}" class="block rounded-lg bg-amber-400 px-4 py-2.5 text-center text-sm font-semibold text-zinc-950 transition hover:bg-amber-300">
                        {{ config('landing.phone') }}
                    </a>
                </div>
            </details>
        </div>
    </div>
</header>