<!-- ===== FOOTER ===== -->
<footer class="border-t border-neutral-200 mt-20">
    <div class="max-w-4xl mx-auto px-6 py-6">

        {{-- 3-column layout: Nama (kiri) | Icons (tengah) | Nav (kanan) --}}
        <div class="flex items-center justify-between gap-4">

            {{-- Kiri: Nama / copyright --}}
            <p class="text-[13px] text-neutral-500 shrink-0" data-i18n="footer.copyright">© Rheza Ardiansyah</p>

            {{-- Tengah: Social icons --}}
            <div class="flex items-center gap-4">
                <a href="https://twitter.com" target="_blank" aria-label="X"
                    class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L2.25 2.25h6.834l4.258 5.631zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </a>
                <a href="https://linkedin.com/in/rheza-ardiansyah" target="_blank" aria-label="LinkedIn"
                    class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </a>
                <a href="https://instagram.com/rheza.ardiansyah/" target="_blank" aria-label="Instagram"
                    class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                    </svg>
                </a>
                <a href="https://substack.com/@thebriefandbeyond" target="_blank" aria-label="Substack"
                    class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M22.539 8.242H1.46V5.406h21.08v2.836zM1.46 10.812V24L12 18.11 22.54 24V10.812H1.46zM22.54 0H1.46v2.836h21.08V0z" />
                    </svg>
                </a>
                <a href="mailto:rheza.ardi@gmail.com" aria-label="Email"
                    class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/>
                    </svg>
                </a>
            </div>

            {{-- Kanan: Nav links --}}
            <nav class="flex items-center gap-5 shrink-0">
                <a href="{{ route('home') }}"
                    class="text-[13px] text-neutral-500 hover:text-neutral-900 transition-colors">{{ __('nav.home') }}</a>
                <a href="{{ route('about') }}"
                    class="text-[13px] text-neutral-500 hover:text-neutral-900 transition-colors">{{ __('nav.about') }}</a>
                <a href="{{ route('blogs.index') }}"
                    class="text-[13px] text-neutral-500 hover:text-neutral-900 transition-colors">{{ __('nav.blogs') }}</a>
                <a href="{{ route('works.index') }}"
                    class="text-[13px] text-neutral-500 hover:text-neutral-900 transition-colors">{{ __('nav.works') }}</a>
            </nav>

        </div>

    </div>
</footer>