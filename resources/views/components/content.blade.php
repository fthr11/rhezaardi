@props([
    'content',
    'images' => [],
    'title' => '',
    'disk' => 'blogs',
])

@php
    $paragraphs = array_values(array_filter(explode('</p>', $content)));
    $total = count($paragraphs);
    $insertAfter = (int) floor($total / 2) - 1;
@endphp

<div class="space-y-6 text-[15px] leading-[1.85] text-neutral-700 text-justify mb-16">
    @foreach ($paragraphs as $index => $paragraph)
        @if (trim($paragraph))
            {!! $paragraph . '</p>' !!}
        @endif

        @if ($index === $insertAfter && $images && count($images) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-8">
                @foreach ($images as $img)
                    <div class="overflow-hidden aspect-[4/3] bg-neutral-100 rounded-sm">
                        <img src="{{ asset('images/' . $disk . '/' . $img) }}" alt="{{ $title }}" width="400"
                            height="300" loading="lazy" decoding="async" class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
</div>