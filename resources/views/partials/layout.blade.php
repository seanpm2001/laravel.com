<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    @if (isset($currentVersion) && $currentVersion == 'master')
    <title>{{ isset($title) ? $title . ' - ' : null }}Laravel Upcoming - The PHP Framework For Web Artisans</title>
    @else
    <title>{{ isset($title) ? $title . ' - ' : null }}Laravel {{ isset($currentVersion) ? $currentVersion . ' ' : null }}- The PHP Framework For Web Artisans</title>
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    @if (isset($canonical))
    <link rel="canonical" href="{{ url($canonical) }}">
    @endif

    <!-- Primary Meta Tags -->
    <meta name="title" content="Laravel - The PHP Framework For Web Artisans">
    <meta name="description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://laravel.com/">
    <meta property="og:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="og:description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="og:image" content="https://laravel.com/img/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravel.com/">
    <meta property="twitter:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="twitter:description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="twitter:image" content="https://laravel.com/img/og-image.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff2d20">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light">

    <link rel="preconnect" href="https://{{ config('algolia.connections.main.id') }}-dsn.algolia.net" crossorigin />

    <link rel="stylesheet" href="https://use.typekit.net/ins2wgm.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="DVMEKBYF" defer></script>
        <!-- / Fathom -->
    @endproduction

    @php
        $routesThatAreAlwaysLightMode = collect([
            'frontend',
            'marketing',
            'team',
            'trademark',
        ])
    @endphp

    <script>
        const alwaysLightMode = {{ ($routesThatAreAlwaysLightMode->contains(request()->route()->getName())) ? 'true' : 'false' }};
    </script>

    @include('partials.theme')
</head>
<body
    x-data="{
        navIsOpen: false,
    }"
    class="w-full h-full font-sans antialiased text-gray-900 language-php"
>

@yield('content')

@include('partials.footer')

<script>
    var algolia_app_id = '{{ config('algolia.connections.main.id', false) }}';
    var algolia_search_key = '{{ config('algolia.connections.main.search_key', false) }}';
    var version = '{{ isset($currentVersion) ? $currentVersion : DEFAULT_VERSION }}';
</script>

<script>
    var _gaq=[['_setAccount','UA-23865777-1'],['_trackPageview']];
    (function(d,t){
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)
    }(document,'script'));
</script>

<div class="fixed">
    <input type="text">
</div>

</body>
</html>
