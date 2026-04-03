@extends('layouts.app')

@section('title', 'Rheza Ardiansyah — Journalist')
@section('description', 'Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller with 14+ years of experience.')

@section('content')
    <div class="max-w-4xl mx-auto px-6 pt-10 sm:pt-16 text-black">

        {{-- ====== HERO ====== --}}
        <section class="mb-16">

            {{-- Name full width --}}
            <h1
                class="font-sans font-semibold text-[2.4rem] sm:text-[6rem] leading-[1.05] tracking-tight text-neutral-900 mb-6">
                {{ __('home.name') }}
                <h2 class="font-semibold text-[20x] leading-[1.8] text-black space-y-3 max-w-[520px] flex sm:hidden">
                    Documentary
                    Filmmaking, Journalism, Sustainability</h2>
            </h1>
        </section>

        {{-- ====== FEATURED BLOGS ====== --}}
        <section class="mb-14">
            <h2 class="font-serif font-semibold text-2xl font-bold tracking-tight mb-4">{{ __('home.featured_blog') }}
            </h2>
            {{-- ====== HERO IMAGE ====== --}}
            <livewire:home.featured-blog lazy />
        </section>

        {{-- ====== LATEST BLOGS ====== --}}
        <section class="mb-14">
            <div class="flex items-center justify-between border-b-1 border-neutral-900 pb-3 mb-7">
                <h2 class="font-serif font-semibold text-2xl font-bold tracking-tight">{{ __('home.latest_blog') }}</h2>
                <a href="{{ route('blogs.index') }}" wire:navigate
                    class="text-[13.5px] text-neutral-500 hover:text-neutral-900 transition-colors shrink-0">
                    {{ __('home.see_all') }}
                </a>
            </div>

            <livewire:home.latest-blogs lazy />
        </section>

        {{-- ====== LATEST PROJECTS ====== --}}
        <section class="mb-14">
            <div class="flex items-center justify-between border-b-1 border-neutral-900 pb-3 mb-7">
                <h2 class="font-serif font-semibold text-2xl font-bold tracking-tight">{{ __('home.latest_projects') }}</h2>
                <a href="{{ route('works.index') }}" wire:navigate
                    class="text-[13.5px] text-neutral-500 hover:text-neutral-900 transition-colors shrink-0">
                    {{ __('home.see_all') }}
                </a>
            </div>

            <livewire:home.latest-projects lazy />
        </section>

    </div>
@endsection