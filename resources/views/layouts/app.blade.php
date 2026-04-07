<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rheza Ardiansyah')</title>
    <meta name="description"
        content="@yield('description', 'Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller')">
    <meta name="author" content="Rheza Ardiansyah">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    @php
        $currentPath = request()->path();
        $segments = explode('/', $currentPath);
        $restOfPath = count($segments) > 1 ? implode('/', array_slice($segments, 1)) : '';
    @endphp
    <link rel="alternate" hreflang="en" href="{{ url('en/' . $restOfPath) }}">
    <link rel="alternate" hreflang="id" href="{{ url('id/' . $restOfPath) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('en/' . $restOfPath) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Rheza Ardiansyah')">
    <meta property="og:description"
        content="@yield('description', 'Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Rheza Ardiansyah')">
    <meta property="twitter:description"
        content="@yield('description', 'Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" media="print"
        onload="this.media='all'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap">
    </noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('head')
</head>

<body class="bg-white text-black antialiased font-sans">

    <x-navbar />

    <!-- ===== MAIN ===== -->
    <main class="min-h-[calc(100vh-64px-180px)] my-10">
        @yield('content')
    </main>

    <x-footer />

    @livewireScripts
    <script>
        if (!window._listenersRegistered) {
            window._listenersRegistered = true;

            // ===== NAVBAR SCROLL =====
            window.addEventListener('scroll', () => {
                const navbar = document.getElementById('navbar');
                if (!navbar) return;
                if (window.scrollY > 10) {
                    navbar.classList.add('border-neutral-200');
                    navbar.classList.remove('border-transparent');
                } else {
                    navbar.classList.add('border-transparent');
                    navbar.classList.remove('border-neutral-200');
                }
            });

            // ===== MOBILE MENU (event delegation) =====
            document.addEventListener('click', (e) => {
                if (e.target.closest('#navToggle')) {
                    const mobileMenu = document.getElementById('mobileMenu');
                    if (mobileMenu) {
                        mobileMenu.classList.toggle('hidden');
                        mobileMenu.classList.toggle('flex');
                    }
                }
            });

            // ===== TUTUP MENU SAAT NAVIGASI =====
            document.addEventListener('livewire:navigated', () => {
                const mobileMenu = document.getElementById('mobileMenu');
                if (mobileMenu) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                }
            });
        }
    </script>

    @stack('scripts')
</body>

</html>