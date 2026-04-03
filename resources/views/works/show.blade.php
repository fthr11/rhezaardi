@extends('layouts.app')

@section('title', $project->title . ' — Rheza Ardiansyah')
@section('description', Str::limit(strip_tags($project->description), 160))

@section('content')
    <div class="max-w-4xl mx-auto px-6 pt-14 sm:pt-16">

        {{-- ====== BACK LINK ====== --}}
        <a href="{{ route('works.index') }}" wire:navigate
            class="inline-flex items-center gap-2 text-[13px] text-neutral-400 hover:text-neutral-900 transition-colors duration-200 mb-10 group">
            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:-translate-x-0.5" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 5l-7 7 7 7" />
            </svg>
            {{ __('works.back') }}
        </a>

        {{-- ====== META : Date ====== --}}
        <div class="flex items-center gap-3 mb-5">
            <span class="text-[12px] text-neutral-400">{{ $project->created_at->format('d M Y') }}</span>
        </div>

        {{-- ====== PAGE TITLE ====== --}}
        <h1
            class="font-serif font-semibold text-[2.4rem] sm:text-[4rem] font-black tracking-tight leading-[1.05] text-neutral-900 mb-8">
            {{ $project->title }}
        </h1>

        {{-- ====== HERO IMAGE ====== --}}
        <div class="w-full mb-10 overflow-hidden">
            <img src="{{ asset('images/projects/' . $project->thumbnail) }}" alt="{{ $project->title }}" width="800"
                height="450" fetchpriority="high" decoding="async" class="w-full aspect-[16/9] object-cover">
        </div>

        <x-content :content="$project->description" :images="$project->images" :title="$project->title" disk="projects" />

        <x-embed :data="$project" :url="$project->embed" />

        {{-- ====== DIVIDER ====== --}}
        <hr class="border-neutral-200 mb-10">

        {{-- ====== SHARE ROW ====== --}}
        <div class="flex flex-wrap items-center justify-end gap-4 mb-20">
            <div class="flex items-center gap-3">
                <span class="text-[12px] text-neutral-400 mr-1">{{ __('blog.share') }}</span>
                {{-- Twitter / X --}}
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($project->title) }}&url={{ urlencode(url()->current()) }}"
                    target="_blank" aria-label="Share on X" class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L2.25 2.25h6.834l4.258 5.631zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </a>
                {{-- LinkedIn --}}
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                    target="_blank" aria-label="Share on LinkedIn" class="opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- ====== RELATED PROJECTS ====== --}}
        @if ($related->count())
            <div class="mb-20">
                <h2 class="text-[13px] font-semibold tracking-widest uppercase text-neutral-400 mb-6">
                    {{ __('works.more_works') }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-10">
                    @foreach ($related as $rel)
                        <x-card :item="$rel" type="work" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
@endsection