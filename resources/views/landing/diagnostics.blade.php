<section id="diagnostics" class="scroll-mt-20">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p data-reveal class="text-sm font-semibold uppercase tracking-widest text-amber-400">Диагностика</p>
        <h2 data-reveal class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Ищу неисправность профессиональным оборудованием</h2>
        <p data-reveal class="mt-3 max-w-2xl text-zinc-400">
            Любой ремонт начинаю с поиска причины, а не замены деталей наугад. Для этого использую
            профессиональное диагностическое оборудование:
        </p>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (config('landing.diagnostics') as $tool)
                <article data-reveal class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40 hover:bg-zinc-900">
                    <span class="grid size-12 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                        @if ($tool['icon'] === 'search')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>
                        @elseif ($tool['icon'] === 'wave')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M2 12h2l2.5-6 3 12 3-16 3 12 2-2h4.5"/>
                            </svg>
                        @elseif ($tool['icon'] === 'scope')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M7 3v2.5a2 2 0 0 0 2 2h.5"/>
                                <path d="M7 11v-1.5a2 2 0 0 1 2-2h.5"/>
                                <path d="M9.5 3h9a2 2 0 0 1 2 2v1.5a2 2 0 0 1-2 2h-9"/>
                                <path d="M7 11a4.5 4.5 0 0 0 4.5 4.5H13"/>
                                <path d="M15.5 13a4.5 4.5 0 0 1-4.5 4.5H10a2 2 0 0 0-2 2V21"/>
                            </svg>
                        @elseif ($tool['icon'] === 'steth')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M4.8 2.3A.3.3 0 1 0 5 2H4a2 2 0 0 0-2 2v5a6 6 0 0 0 6 6a6 6 0 0 0 6-6V4a2 2 0 0 0-2-2h-1a.2.2 0 1 0 .3.3"/>
                                <path d="M8 15v1a6 6 0 0 0 6 6a6 6 0 0 0 6-6v-4"/>
                                <circle cx="20" cy="10" r="2"/>
                            </svg>
                        @elseif ($tool['icon'] === 'gauge')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m12 14 4-4"/>
                                <path d="M3.34 19a10 10 0 1 1 17.32 0"/>
                            </svg>
                        @elseif ($tool['icon'] === 'fuel')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"/>
                            </svg>
                        @elseif ($tool['icon'] === 'oil')
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M14 2c2 4 6 6.4 6 11a8 8 0 0 1-16 0c0-2.4 1.6-4.6 3.2-6.2L12 2Z"/>
                                <path d="M12 22a4.5 4.5 0 0 0 4.5-4.5c0-1.4-1-2.8-2.2-4L12 9l-2.3 4.5c-1.2 1.2-2.2 2.6-2.2 4A4.5 4.5 0 0 0 12 22z"/>
                            </svg>
                        @else
                            <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M17.5 19H9a7 7 0 1 1 6.7-9h1.8a4.5 4.5 0 1 1 0 9Z"/>
                            </svg>
                        @endif
                    </span>
                    <h3 class="mt-4 font-display text-base font-semibold text-white">{{ $tool['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-zinc-400">{{ $tool['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>