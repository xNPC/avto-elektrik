@extends('articles.layout')

@section('content')
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-400">Статьи</p>
        <h1 class="mt-3 max-w-3xl font-display text-3xl font-bold text-white sm:text-4xl">{{ config('landing.articles_index_title') }}</h1>
        <p class="mt-3 max-w-2xl text-zinc-400">
            Разбираю типичные неисправности электрооборудования: причины, самостоятельные проверки и когда нужен мастер.
        </p>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (config('landing.articles') as $slug => $articleMeta)
                <a
                    href="{{ url('/stati/'.$slug) }}"
                    class="group flex flex-col rounded-2xl border border-white/10 bg-zinc-900/60 p-6 transition duration-300 hover:-translate-y-0.5 hover:border-amber-400/40"
                >
                    <h2 class="font-display text-lg font-semibold leading-snug text-white transition group-hover:text-amber-400">{{ $articleMeta['title'] }}</h2>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-zinc-400">{{ $articleMeta['description'] }}</p>
                    <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-amber-400">
                        Читать статью
                        <svg class="size-4 transition group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </span>
                </a>
            @endforeach
        </div>

        <div class="mx-auto mt-20 max-w-xl rounded-3xl border border-white/10 bg-zinc-900/60 p-8 sm:p-10">
            <h2 class="font-display text-xl font-bold text-white">Не нашли ответ на свой вопрос?</h2>
            <p class="mt-2 text-sm text-zinc-400">
                Позвоните — по описанию симптомов подскажу, в чём может быть причина, и договоримся о выезде.
            </p>

            <div class="mt-6 space-y-3">
                <a
                    href="tel:{{ config('landing.phone_href') }}"
                    class="flex items-center justify-center gap-2.5 rounded-xl bg-amber-400 px-6 py-4 text-base font-semibold text-zinc-950 transition hover:bg-amber-300"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    {{ config('landing.phone') }}
                </a>
                <a
                    href="{{ config('landing.whatsapp') }}"
                    target="_blank"
                    rel="noopener"
                    class="flex items-center justify-center gap-2.5 rounded-xl border border-emerald-400/40 px-6 py-4 text-base font-semibold text-emerald-300 transition hover:bg-emerald-400 hover:text-zinc-950"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                    Написать в WhatsApp
                </a>
                @if (config('landing.max'))
                    <a
                        href="{{ config('landing.max') }}"
                        target="_blank"
                        rel="noopener"
                        class="flex items-center justify-center gap-2.5 rounded-xl border border-[#471AFF]/40 px-6 py-4 text-base font-semibold text-[#b9a9ff] transition hover:bg-[#471AFF] hover:text-white"
                    >
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>
                        </svg>
                        Написать в MAX
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
