<aside class="mt-20 rounded-3xl border border-white/10 bg-zinc-900/60 p-8 sm:p-10">
    <h2 class="font-display text-xl font-bold text-white">Нужна помощь с вашей машиной?</h2>
    <p class="mt-2 text-sm text-zinc-400">
        Позвоните или напишите в мессенджер — подскажу по неисправности и договоримся о выезде по {{ config('landing.city') }}.
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
</aside>
