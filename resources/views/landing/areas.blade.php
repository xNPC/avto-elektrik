<section id="areas" class="scroll-mt-20 border-y border-white/5 bg-zinc-900/40">
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">География</p>
        <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Выезжаю по всему Кемерово</h2>
        <p class="mt-3 max-w-2xl text-zinc-400">
            Работаю на выезде в любом районе города — на стоянке, в гараже или на месте поломки.
            @if (count(config('landing.suburb')) > 0)
                Также выезжаю в пригород.
            @endif
        </p>

        <ul class="mt-10 flex flex-wrap gap-3">
            @foreach (config('landing.districts') as $district)
                <li data-reveal class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-zinc-950 px-4 py-2 text-sm text-zinc-300">
                    <svg class="size-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    {{ $district }}
                </li>
            @endforeach

            @foreach (config('landing.suburb') as $suburb)
                <li data-reveal class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-zinc-950 px-4 py-2 text-sm text-zinc-300">
                    <svg class="size-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    {{ $suburb }}
                </li>
            @endforeach
        </ul>
    </div>
</section>