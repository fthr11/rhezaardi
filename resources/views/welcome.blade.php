@extends('layouts.app')

@section('title', 'Rheza Ardiansyah | Journalist, Filmmaker & Storyteller')
@section('description', 'Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller with 14+ years of experience.')

@section('head')
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "Person",
            "name": "Rheza Ardiansyah",
            "url": "{{ url('/') }}",
            "image": "{{ asset('images/photo.jpg') }}",
            ...
        }
    </script>

    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "WebSite",
            "url": "{{ url('/') }}",
            ...
        }
    </script>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto px-6 pt-10 sm:pt-16 text-black">

        {{-- ====== HERO ====== --}}
        <section class="mb-16">
            <div class="flex flex-col sm:flex-row sm:items-start gap-8 sm:gap-20">
                <div class="sm:hidden mb-8">
                    <h1 class="font-serif font-semibold text-[2.4rem] font-black font-semibold text-neutral-900 ">
                        {{ __('home.name') }}
                    </h1>
                    <p class="text-[15px] sm:text-[16px] text-neutral-500 leading-relaxed pt-2">
                        Documentary Filmmaking, Journalism, Sustainability
                    </p>
                </div>

                {{-- Photo --}}
                <div class="w-[200px] sm:w-[300px] shrink-0 mx-auto hidden sm:block sm:mx-0">
                    <img src={{ asset("/images/Profile.png") }} alt="Rheza Ardiansyah" width="250" height="300"
                        fetchpriority="high" decoding="async" class="w-full object-cover object-top rounded-sm">
                </div>

                {{-- Text --}}
                <div class="hidden sm:flex flex-col justify-center text-center sm:text-left pt-0 sm:pt-4">
                    <h1
                        class="font-sans font-semibold text-[2rem] sm:text-[5rem] leading-[1.1] tracking-tight text-neutral-900 mb-3">
                        {{ __('home.name') }}
                    </h1>
                    <p class="text-[15px] sm:text-[16px] text-neutral-500 leading-relaxed mb-6">
                        Documentary Filmmaking, Journalism, Sustainability
                    </p>
                    <div>
                        <a href="{{ route('about') }}" wire:navigate
                            class="inline-block px-5 py-2.5 text-[13px] font-semibold tracking-wide border border-neutral-900 text-neutral-900 rounded-full hover:bg-neutral-900 hover:text-white transition-all duration-200">
                            {{ __('home.my_story') }}
                        </a>
                    </div>
                </div>

            </div>
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