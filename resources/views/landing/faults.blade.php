<section id="faults" class="scroll-mt-20">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Частые неисправности</p>
        <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Знакомые симптомы?</h2>
        <p class="mt-3 max-w-2xl text-zinc-400">
            Эти проблемы — моя ежедневная работа. Позвоните, опишите симптомы — подскажу, в чём может быть причина.
        </p>

        @php
            $faults = [
                [
                    'title' => 'Автомобиль не заводится',
                    'text' => 'Стартер крутит, но двигатель молчит, или слышен только щелчок — возможны проблемы со стартером, проводкой или питанием.',
                ],
                [
                    'title' => 'Аккумулятор быстро разряжается',
                    'text' => 'Машина стоит сутки — и аккумулятор сел. Причина может быть в утечке тока или неисправном генераторе.',
                ],
                [
                    'title' => 'Не работают фары или приборы',
                    'text' => 'Пропал свет, не горит панель приборов, не поднимается стекло — ищу обрыв или окисление в проводке.',
                ],
                [
                    'title' => 'Плавают обороты, троит двигатель',
                    'text' => 'Нестабильная работа часто связана с датчиками и проводкой. Диагностика покажет точную причину.',
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($faults as $fault)
                <article data-reveal class="flex flex-col rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40">
                    <span class="grid size-11 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/>
                        </svg>
                    </span>
                    <h3 class="mt-4 font-display text-base font-semibold text-white">{{ $fault['title'] }}</h3>
                    <p class="mt-2 flex-1 text-sm leading-relaxed text-zinc-400">{{ $fault['text'] }}</p>
                    <a href="tel:{{ config('landing.phone_href') }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amber-400 transition hover:text-amber-300">
                        Позвонить мастеру
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>