<div>
    @foreach ($featuredBlogs as $post)
        <a href="{{ route('blogs.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" wire:navigate
            class="group w-full mb-10 overflow-hidden block">
            <div class="overflow-hidden w-full h-100 sm:h-[500px] rounded-sm bg-neutral-100">
                <img src="{{ asset('images/blogs/' . $post->thumbnail) }}" alt="{{ $post->title }}" width="800" height="500"
                    loading="eager" fetchpriority="high" decoding="async"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <h3 class="text-[14.5px] text-neutral-900 mt-4 mb-1 leading-snug">{{ $post->title }}</h3>
            <p class="text-[13px] text-neutral-500 leading-relaxed mb-2">
                {{ Str::limit(strip_tags($post->content), 100) }}
            </p>
            <span class="text-xs text-neutral-400">{{ $post->created_at->format('d M Y') }}</span>
        </a>
    @endforeach
</div>