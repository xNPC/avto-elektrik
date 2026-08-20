<section class="border-y border-white/5 bg-zinc-900/40">
    <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 sm:py-12">
        <div class="flex flex-col items-start justify-between gap-5 lg:flex-row lg:items-center">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-amber-400 sm:text-sm">Помощь на дороге</p>
                <h2 class="mt-1.5 font-display text-xl font-bold text-white sm:mt-2 sm:text-2xl">Машина встала? Приеду и помогу</h2>
                <p class="mt-2 hidden max-w-xl text-sm leading-relaxed text-zinc-400 sm:block">
                    Выезд по {{ config('landing.city') }}, {{ mb_strtolower(config('landing.hours')) }}. Решаю большинство задач прямо на месте.
                </p>
            </div>
            <a
                href="tel:{{ config('landing.phone_href') }}"
                class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-amber-400 px-6 py-3 text-sm font-semibold text-zinc-950 shadow-lg shadow-amber-400/20 transition hover:bg-amber-300 sm:gap-2.5 sm:px-7 sm:py-3.5 sm:text-base"
            >
                <svg class="size-4 sm:size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                Позвонить
            </a>
        </div>

        <div class="mt-6 flex gap-3 overflow-x-auto sm:mt-8 sm:grid sm:grid-cols-2 sm:gap-4 sm:overflow-visible lg:grid-cols-4">
            @foreach (config('landing.roadside') as $item)
                <div class="flex shrink-0 items-center gap-3 rounded-xl border border-white/10 bg-zinc-950 px-4 py-3 sm:block sm:shrink sm:rounded-2xl sm:p-5">
                    <span class="grid size-10 shrink-0 place-items-center rounded-lg bg-amber-400/10 text-amber-400 sm:size-11 sm:rounded-xl">
                        @if ($item['icon'] === 'car')
                            <svg class="size-4 sm:size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                                <circle cx="7" cy="17" r="2"/>
                                <path d="M9 17h6"/>
                                <circle cx="17" cy="17" r="2"/>
                            </svg>
                        @elseif ($item['icon'] === 'fuel')
                            <svg class="size-4 sm:size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M3 22V8a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v14"/>
                                <path d="M3 13h8"/>
                                <path d="M19 22v-9l-3.5-3.5"/>
                                <path d="M19 13h2a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-2"/>
                                <path d="M13 22h10"/>
                            </svg>
                        @elseif ($item['icon'] === 'battery')
                            <svg class="size-4 sm:size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="2" y="7" width="16" height="10" rx="2"/>
                                <path d="M22 11v2"/>
                                <path d="M6 11v2"/>
                                <path d="M10 11v2"/>
                                <path d="M14 11v2"/>
                            </svg>
                        @else
                            <svg class="size-4 sm:size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="11" width="18" height="11" rx="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                        @endif
                    </span>
                    <h3 class="text-sm font-semibold text-white sm:mt-4 sm:font-display sm:text-base">{{ $item['title'] }}</h3>
                    <p class="mt-2 hidden text-sm leading-relaxed text-zinc-400 sm:block">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>