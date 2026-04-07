@php echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach ($locales as $locale)
        {{-- Home Page --}}
        <url>
            <loc>{{ url($locale) }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
            @foreach ($locales as $altLocale)
                <xhtml:link rel="alternate" hreflang="{{ $altLocale }}" href="{{ url($altLocale) }}" />
            @endforeach
        </url>

        {{-- About Page --}}
        <url>
            <loc>{{ url($locale . '/about') }}</loc>
            <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
            @foreach ($locales as $altLocale)
                <xhtml:link rel="alternate" hreflang="{{ $altLocale }}" href="{{ url($altLocale . '/about') }}" />
            @endforeach
        </url>

        {{-- Blogs Index --}}
        <url>
            <loc>{{ url($locale . '/blogs') }}</loc>
            <lastmod>{{ $blogs->max('updated_at')?->toAtomString() ?? now()->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
            @foreach ($locales as $altLocale)
                <xhtml:link rel="alternate" hreflang="{{ $altLocale }}" href="{{ url($altLocale . '/blogs') }}" />
            @endforeach
        </url>

        {{-- Works Index --}}
        <url>
            <loc>{{ url($locale . '/works') }}</loc>
            <lastmod>{{ $works->max('updated_at')?->toAtomString() ?? now()->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            @foreach ($locales as $altLocale)
                <xhtml:link rel="alternate" hreflang="{{ $altLocale }}" href="{{ url($altLocale . '/works') }}" />
            @endforeach
        </url>

        {{-- Individual Blogs --}}
        @foreach ($blogs as $blog)
            <url>
                <loc>{{ url($locale . '/blogs/' . ($locale === 'id' ? $blog->slugID : $blog->slugEN)) }}</loc>
                <lastmod>{{ $blog->updated_at->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.7</priority>
                @foreach ($locales as $altLocale)
                    <xhtml:link rel="alternate" hreflang="{{ $altLocale }}"
                        href="{{ url($altLocale . '/blogs/' . ($altLocale === 'id' ? $blog->slugID : $blog->slugEN)) }}" />
                @endforeach
            </url>
        @endforeach

        {{-- Individual Works --}}
        @foreach ($works as $work)
            <url>
                <loc>{{ url($locale . '/works/' . ($locale === 'id' ? $work->slugID : $work->slugEN)) }}</loc>
                <lastmod>{{ $work->updated_at->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.7</priority>
                @foreach ($locales as $altLocale)
                    <xhtml:link rel="alternate" hreflang="{{ $altLocale }}"
                        href="{{ url($altLocale . '/works/' . ($altLocale === 'id' ? $work->slugID : $work->slugEN)) }}" />
                @endforeach
            </url>
        @endforeach
    @endforeach
</urlset>