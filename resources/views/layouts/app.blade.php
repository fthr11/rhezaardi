<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rheza Ardiansyah')</title>
    <meta name="description"
        content="@yield('description', 'Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller')">

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
        // ===== NAVBAR SCROLL =====
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('border-neutral-200');
                navbar.classList.remove('border-transparent');
            } else {
                navbar.classList.add('border-transparent');
                navbar.classList.remove('border-neutral-200');
            }
        });

        // ===== MOBILE MENU =====
        const navToggle = document.getElementById('navToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        navToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        });

    </script>

    @stack('scripts')
</body>

</html>