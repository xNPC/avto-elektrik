<section id="works" class="scroll-mt-20 border-t border-white/5 bg-zinc-900/30">
    <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6">
        <p data-reveal class="text-sm font-semibold uppercase tracking-widest text-amber-400">Работы</p>
        <h2 data-reveal class="mt-3 font-display text-3xl font-bold text-white sm:text-4xl">Примеры выполненных работ</h2>
        <p data-reveal class="mt-3 max-w-2xl text-zinc-400">
            Реальные работы с выездов и из мастерской: промывка форсунок, установка оборудования,
            поиск сложных неисправностей.
        </p>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (config('landing.works') as $work)
                <figure data-reveal class="group overflow-hidden rounded-2xl border border-white/10 bg-zinc-900/60 shadow-lg shadow-black/20">
                    <img
                        src="{{ asset('images/works/'.$work['src']).'?v='.filemtime(public_path('images/works/'.$work['src'])) }}"
                        alt="Выполненная работа — автоэлектрик в Кемерово"
                        width="{{ $work['w'] }}"
                        height="{{ $work['h'] }}"
                        loading="lazy"
                        decoding="async"
                        class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"
                    >
                </figure>
            @endforeach
        </div>
    </div>
</section>