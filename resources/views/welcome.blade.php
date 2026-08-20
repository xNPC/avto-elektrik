<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('landing.title') }}</title>
        <meta name="description" content="{{ config('landing.description') }}">

        <link rel="canonical" href="{{ url('/') }}">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:title" content="{{ config('landing.title') }}">
        <meta property="og:description" content="{{ config('landing.description') }}">
        <meta property="og:locale" content="ru_RU">
        @if (config('landing.og_image'))
            <meta property="og:image" content="{{ url(config('landing.og_image')) }}">
            <meta property="og:image:width" content="1200">
            <meta property="og:image:height" content="630">
        @endif

        <meta name="geo.region" content="RU-KEM">
        <meta name="geo.placename" content="Кемерово">
        <meta name="ICBM" content="{{ config('landing.latitude') }}, {{ config('landing.longitude') }}">

        @if (config('landing.yandex_verification'))
            <meta name="yandex-verification" content="{{ config('landing.yandex_verification') }}">
        @endif
        @if (config('landing.google_verification'))
            <meta name="google-site-verification" content="{{ config('landing.google_verification') }}">
        @endif

        <script>document.documentElement.classList.add('js');</script>

        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="icon" type="image/png" sizes="120x120" href="/favicon-120.png">
        <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="any">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @fonts

        <!-- Styles -->
        @vite(['resources/css/landing.css', 'resources/js/app.js'])

        @php
            $landingSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'AutoRepair',
                'name' => config('landing.name'),
                'description' => config('landing.description'),
                'url' => url('/'),
                'image' => config('landing.og_image') ? url(config('landing.og_image')) : null,
                'telephone' => config('landing.phone_href'),
                'priceRange' => '₽₽',
                'areaServed' => config('landing.city'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Кемерово',
                    'addressRegion' => 'Кемеровская область',
                    'addressCountry' => 'RU',
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => config('landing.latitude'),
                    'longitude' => config('landing.longitude'),
                ],
                'openingHours' => 'Mo-Su 08:00-20:00',
                'makesOffer' => array_map(fn (array $service) => [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service['title'],
                        'description' => $service['text'],
                    ],
                ], config('landing.services')),
            ];
        @endphp

        <script type="application/ld+json">
@json(array_filter($landingSchema))
        </script>

        @if (config('landing.metrika_id'))
            <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
                (function(m,e,t,r,i,k,a){
                    m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                    m[i].l=1*new Date();
                    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
                })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id={{ config('landing.metrika_id') }}', 'ym');

                ym({{ config('landing.metrika_id') }}, 'init', {ssr:true, webvisor:true, trackHash:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
            </script>
            <!-- /Yandex.Metrika counter -->
        @endif
    </head>
    <body id="top" class="bg-zinc-950 font-sans text-zinc-100 antialiased selection:bg-amber-400 selection:text-zinc-950">
        @include('landing.header')

        <main>
            @include('landing.hero')
            @include('landing.roadside')
            @include('landing.directions')
            @include('landing.services')
            @include('landing.diagnostics')
            @include('landing.extras')
            @include('landing.about')
            @include('landing.areas')
            @include('landing.faults')
            @include('landing.works')
            @include('landing.reviews')
            @include('landing.faq')
            @include('landing.contacts')
        </main>

        @include('landing.footer')
    </body>
</html>