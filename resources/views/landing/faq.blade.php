<section id="faq" class="scroll-mt-20">
    @php
        $faq = [
            [
                'question' => 'Сколько стоит диагностика и ремонт?',
                'answer' => 'Точную стоимость называю после осмотра и диагностики, до начала работ — вы заранее знаете сумму. Платите только за выполненную работу.',
            ],
            [
                'question' => 'Вы выезжаете на место?',
                'answer' => 'Да, выезжаю по Кемерово и пригороду: на стоянку, в гараж или на работу. Многие неисправности устраняю прямо на месте.',
            ],
            [
                'question' => 'С какими автомобилями работаете?',
                'answer' => 'С легковыми и грузовыми автомобилями, а также со спецтехникой — от отечественных марок до иномарок.',
            ],
            [
                'question' => 'Сколько времени занимает ремонт?',
                'answer' => 'Простые задачи решаю за 1–2 часа. На сложные случаи срок называю после диагностики.',
            ],
            [
                'question' => 'Даёте ли гарантию?',
                'answer' => 'Да, даю гарантию на выполненные работы.',
            ],
            [
                'question' => 'Каким оборудованием проводите диагностику?',
                'answer' => 'Для поиска неисправностей использую диагностический сканер, осциллограф, эндоскоп, стетоскоп и дымогенератор; проверяю компрессию в цилиндрах, давление топлива и масла.',
            ],
            [
                'question' => 'Почему частный мастер, а не автосервис?',
                'answer' => 'Без очередей и наценок: вы общаетесь напрямую с мастером, видите, за что платите, и ремонт часто обходится дешевле.',
            ],
        ];
    @endphp

    @php
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn (array $item) => [
                '@type' => 'Question',
                'name' => $item['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['answer'],
                ],
            ], $faq),
        ];
    @endphp

    <script type="application/ld+json">
@json($faqSchema)
    </script>

    <div class="mx-auto max-w-4xl px-4 py-20 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Вопросы и ответы</p>
        <h2 class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Частые вопросы</h2>

        <div class="mt-10 space-y-4">
            @foreach ($faq as $item)
                <details data-reveal class="group rounded-2xl border border-white/10 bg-zinc-900/60 transition duration-300 hover:border-amber-400/40 open:border-amber-400/40">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-6 py-5 font-display text-base font-semibold text-white [&::-webkit-details-marker]:hidden">
                        {{ $item['question'] }}
                        <svg class="size-5 shrink-0 text-amber-400 transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </summary>
                    <p class="border-t border-white/5 px-6 py-5 text-sm leading-relaxed text-zinc-400">{{ $item['answer'] }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>