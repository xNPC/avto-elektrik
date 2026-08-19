<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $isArticle = isset($article) && is_array($article);
            $slug = $isArticle ? $article['slug'] : null;
            $canonical = $isArticle ? url('/stati/'.$slug) : url('/stati');
            $pageTitle = $isArticle
                ? $article['title'].' — '.config('landing.name').' в Кемерово'
                : config('landing.articles_index_title').' — '.config('landing.name').' в Кемерово';
            $pageDescription = $isArticle
                ? $article['description']
                : config('landing.articles_index_description');
        @endphp

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}">

        <link rel="canonical" href="{{ $canonical }}">

        <meta property="og:type" content="{{ $isArticle ? 'article' : 'website' }}">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $pageDescription }}">
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

        @if ($isArticle)
            @php
                $articleSchema = [
                    '@context' => 'https://schema.org',
                    '@type' => 'Article',
                    'headline' => $article['title'],
                    'description' => $article['description'],
                    'datePublished' => $article['published'],
                    'dateModified' => $article['published'],
                    'mainEntityOfPage' => $canonical,
                    'author' => [
                        '@type' => 'Person',
                        'name' => config('landing.name'),
                    ],
                    'publisher' => [
                        '@type' => 'Organization',
                        'name' => config('landing.name'),
                        'logo' => [
                            '@type' => 'ImageObject',
                            'url' => url('/favicon.svg'),
                        ],
                    ],
                ];
            @endphp
            <script type="application/ld+json">
@json($articleSchema)
            </script>
        @endif

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
            @yield('content')
        </main>

        @include('landing.footer')
    </body>
</html>
