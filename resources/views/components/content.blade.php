@props([
    'content',
    'images' => [],
    'title' => '',
    'disk' => 'blogs',
])

@php
    $paragraphs  = array_values(array_filter(explode('</p>', $content)));
    $total       = count($paragraphs);
    $imgCount    = is_array($images) ? count($images) : 0;

    // Titik sisipan gambar 1+2: di tengah konten
    $insertAfter = max(0, (int) floor($total / 2) - 1);

    // Gambar ke-3 selalu dipisah ke bawah (berlaku untuk semua jumlah paragraf)
    $splitThird  = $imgCount >= 3;

    // Jika paragraf > 6: sisipkan gambar ke-3 secara inline di ~2/3 konten
    // sehingga paragraf sisanya tetap muncul di bawah gambar ke-3
    $insertThird = ($splitThird && $total > 6) ? (int) floor($total * 2 / 3) : null;
@endphp

<div class="space-y-6 text-[15px] leading-[1.85] text-neutral-700 text-justify mb-16">
    @foreach ($paragraphs as $index => $paragraph)

        @if (trim($paragraph))
            {!! $paragraph . '</p>' !!}
        @endif

        {{-- ── Sisipan gambar 1 & 2 di tengah konten ── --}}
        @if ($index === $insertAfter && $imgCount > 0)

            @if ($imgCount === 1)
                {{-- Layout: 1 full width --}}
                <div class="my-8 overflow-hidden rounded-sm bg-neutral-100">
                    <img src="{{ asset('images/' . $disk . '/' . $images[0]) }}" alt="{{ $title }}"
                        width="800" height="450" loading="lazy" decoding="async"
                        class="w-full aspect-[16/9] object-cover">
                </div>

            @elseif ($imgCount === 2)
                {{-- Layout: 2 berdampingan --}}
                <div class="my-8 grid grid-cols-2 gap-3">
                    <div class="overflow-hidden rounded-sm bg-neutral-100">
                        <img src="{{ asset('images/' . $disk . '/' . $images[0]) }}" alt="{{ $title }}"
                            width="400" height="300" loading="lazy" decoding="async"
                            class="w-full aspect-[4/3] object-cover">
                    </div>
                    <div class="overflow-hidden rounded-sm bg-neutral-100">
                        <img src="{{ asset('images/' . $disk . '/' . $images[1]) }}" alt="{{ $title }}"
                            width="400" height="300" loading="lazy" decoding="async"
                            class="w-full aspect-[4/3] object-cover">
                    </div>
                </div>

            @elseif ($imgCount >= 3)
                {{-- Selalu tampilkan 2 gambar di tengah; gambar ke-3 muncul di bawah --}}
                <div class="my-8 grid grid-cols-2 gap-3">
                    <div class="overflow-hidden rounded-sm bg-neutral-100">
                        <img src="{{ asset('images/' . $disk . '/' . $images[0]) }}" alt="{{ $title }}"
                            width="400" height="300" loading="lazy" decoding="async"
                            class="w-full aspect-[4/3] object-cover">
                    </div>
                    <div class="overflow-hidden rounded-sm bg-neutral-100">
                        <img src="{{ asset('images/' . $disk . '/' . $images[1]) }}" alt="{{ $title }}"
                            width="400" height="300" loading="lazy" decoding="async"
                            class="w-full aspect-[4/3] object-cover">
                    </div>
                </div>
            @endif

        @endif

        {{-- ── Sisipan gambar ke-3 inline di ~2/3 konten (paragraf > 6) ── --}}
        {{-- Paragraf sisanya akan tetap muncul di bawah gambar ini         --}}
        @if ($insertThird !== null && $index === $insertThird)
            <div class="my-8 overflow-hidden rounded-sm bg-neutral-100">
                <img src="{{ asset('images/' . $disk . '/' . $images[2]) }}" alt="{{ $title }}"
                    width="800" height="450" loading="lazy" decoding="async"
                    class="w-full aspect-[16/9] object-cover">
            </div>
        @endif

    @endforeach

    {{-- ── Gambar ke-3 di akhir konten jika 3 < paragraf ≤ 6 ── --}}
    @if ($splitThird && $insertThird === null)
        <div class="mt-8 overflow-hidden rounded-sm bg-neutral-100">
            <img src="{{ asset('images/' . $disk . '/' . $images[2]) }}" alt="{{ $title }}"
                width="800" height="450" loading="lazy" decoding="async"
                class="w-full aspect-[16/9] object-cover">
        </div>
    @endif
</div>
