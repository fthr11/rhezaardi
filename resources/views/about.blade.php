@extends('layouts.app')

@section('title', 'About — Rheza Ardiansyah')
@section('description', 'About Rheza Ardiansyah — Journalist, Documentary Filmmaker & Storyteller with 14+ years of experience.')

@section('content')
    <div class="max-w-4xl mx-auto px-6 pt-14 sm:pt-16">
        {{-- ====== PAGE TITLE ====== --}}
        <h1
            class="font-serif font-semibold text-[3rem] sm:text-[6rem] font-black font-semibold tracking-tight leading-[1.05] text-neutral-900 mb-8">
            {{ __('about.title') }}
        </h1>

        {{-- Bio + Photo row --}}
        <div class="flex flex-col-reverse sm:flex-row gap-12 sm:gap-12 items-center sm:items-start mt-10">

            {{-- Left: subtitle + bio --}}
            <div class="flex-1 min-w-0 text-center sm:text-left">
                <h2 class="font-semibold text-[20x] leading-[1.8] text-black space-y-3 max-w-[520px] mx-auto sm:mx-0">
                    Documentary
                    Filmmaking, Journalism, Sustainability</h2>
                <div class="text-[20x] leading-[1.8] text-black space-y-3 max-w-[520px] mt-7 mx-auto sm:mx-0 text-left">
                    <p>{{ __('home.bio1') }}</p>
                    <p>{{ __('home.bio2') }}</p>
                    <p>{{ __('home.bio3') }}</p>
                </div>
            </div>

            {{-- Right: portrait photo --}}
            <div class="w-[200px] sm:w-[250px] shrink-0 mx-auto sm:mx-0">
                <img src="/images/Profile.png" alt="Rheza Ardiansyah" width="250" height="300" fetchpriority="high"
                    decoding="async" class="w-full object-cover object-top rounded-sm">
            </div>
        </div>

        {{-- ====== WORK EXPERIENCE SECTION ====== --}}
        <div class="mt-28 mb-32 w-full">
            <h2 class="text-xs font-bold text-neutral-400 uppercase tracking-[0.2em] mb-12">Work Experience</h2>

            <x-experience-timeline />
        </div>
    </div>
@endsection