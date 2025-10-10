<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    
    <!-- Preload critical CSS -->
    <link rel="preload" href="{{ mix('css/app.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ mix('css/app.min.css') }}"></noscript>
    
    <!-- DNS prefetch for external resources -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    
    @yield('css')
</head>

<body>
    <header>
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    
    <!-- Load JavaScript asynchronously -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
