<section id="about" class="scroll-mt-20">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Обо мне</p>
        <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Частный мастер — напрямую, без посредников</h2>

        <div class="mt-12 grid items-start gap-10 lg:grid-cols-[minmax(0,2fr)_minmax(0,3fr)]">
            <div data-reveal class="lg:sticky lg:top-24">
                <div class="grid aspect-[4/5] place-items-center rounded-3xl border-2 border-dashed border-zinc-800 bg-zinc-900/40">
                    <span class="flex flex-col items-center gap-3 text-zinc-600">
                        <svg class="size-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <span class="text-sm">Ваше фото</span>
                    </span>
                </div>
                @if (config('landing.experience_years'))
                    <div class="mt-5 rounded-2xl border border-amber-400/30 bg-amber-400/10 p-5 text-center">
                        <p class="font-display text-4xl font-bold text-amber-400">{{ config('landing.experience_years') }}+</p>
                        <p class="mt-1 text-sm text-amber-300">лет в автоэлектрике</p>
                    </div>
                @endif
            </div>

            <div>
                <div data-reveal class="space-y-4 text-base leading-relaxed text-zinc-400">
                    <p>
                        Я частный автоэлектрик — работаю с автомобилями напрямую, без диспетчеров и наценок автосервиса.
                        @if (config('landing.experience_years'))
                            Занимаюсь автоэлектрикой более {{ config('landing.experience_years') }} лет.
                        @endif
                        Вы общаетесь с человеком, который сам будет делать ремонт.
                    </p>
                    <p>
                        Любой ремонт начинаю с диагностики — ищу причину, а не следствие. Прежде чем что-то заменить,
                        называю стоимость и получаю ваше согласие. Для поиска неисправностей использую профессиональное
                        оборудование, для ремонта — проверенные комплектующие.
                    </p>
                    <p>
                        Выезжаю по Кемерово и пригороду: работаю на стоянке, в гараже или прямо на месте поломки.
                        Если ремонт требует мастерской — договоримся о времени.
                    </p>
                </div>

                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    <div data-reveal class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40">
                        <span class="grid size-11 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </span>
                        <h3 class="mt-4 font-display text-base font-semibold text-white">Выезд на место</h3>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-400">
                            Приеду к вам — на стоянку, в гараж или на работу. Если возможно, отремонтирую на месте.
                        </p>
                    </div>

                    <div data-reveal class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40">
                        <span class="grid size-11 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m21 21-4.3-4.3"/>
                                <path d="m8.5 11 1.8 1.8 3.7-3.7"/>
                            </svg>
                        </span>
                        <h3 class="mt-4 font-display text-base font-semibold text-white">Честная диагностика</h3>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-400">
                            Сначала нахожу неисправность и называю стоимость. Ремонтирую только после вашего согласия.
                        </p>
                    </div>

                    <div data-reveal class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40">
                        <span class="grid size-11 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                        </span>
                        <h3 class="mt-4 font-display text-base font-semibold text-white">Гарантия на работы</h3>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-400">
                            Даю гарантию на выполненные работы и установленное оборудование.
                        </p>
                    </div>

                    <div data-reveal class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40">
                        <span class="grid size-11 place-items-center rounded-xl bg-amber-400/10 text-amber-400">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                            </svg>
                        </span>
                        <h3 class="mt-4 font-display text-base font-semibold text-white">Прямая связь</h3>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-400">
                            Без диспетчеров и очередей — общаетесь напрямую с мастером, который будет делать ремонт.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>