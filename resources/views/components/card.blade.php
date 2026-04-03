@props([
    'item' => null,
    'type' => 'blog',
    'imgLoading' => 'lazy',
    'imgPriority' => 'auto',
])
@php
    $disk = $type === 'blog' ? 'blogs' : 'projects';
    $route = $type === 'blog' ? 'blogs.show' : 'works.show';
    $content = $type === 'blog' ? $item->content : $item->description;
    $titleStyle = $type === 'work' ? 'font-semibold' : '';
@endphp

<a href="{{ route($route, ['locale' => app()->getLocale(), 'slug' => $item->slug]) }}" wire:navigate
    class="group block">
    <div class="overflow-hidden rounded-sm aspect-[4/3] mb-3 bg-neutral-100">
        <img src="{{ asset('images/' . $disk . '/' . $item->thumbnail) }}" alt="{{ $item->title }}" width="400"
            height="300" loading="{{ $imgLoading }}" fetchpriority="{{ $imgPriority }}" decoding="async"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
    </div>
    <h3 class="{{ $titleStyle }} text-[14.5px] text-neutral-900 mb-1 leading-snug font-semibold">{{ $item->title }}</h3>
    <p class="text-[13px] text-neutral-500 leading-relaxed mb-2">
        {{ Str::limit(strip_tags($content), 100) }}
    </p>
    <span class="text-xs text-neutral-400">{{ $item->created_at->format('d M Y') }}</span>
</a>