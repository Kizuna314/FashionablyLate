<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a href="{{ route('contact.index') }}" class="header__logo">FashionablyLate</a>
            <nav class="header__nav">
                <a href="{{ route('login') }}" class="header__nav-item">login</a>
            </nav>
        </div>
    </header>

    @yield('content')
</body>
</html>