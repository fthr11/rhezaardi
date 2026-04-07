@extends('layouts.app')

@section('title', 'All Works | Rheza Ardiansyah')
@section('description', 'All projects and works by Rheza Ardiansyah — documentaries, journalism, and more.')

@section('content')
    <div class="max-w-4xl mx-auto px-6 pt-14 sm:pt-16">

        {{-- ====== PAGE TITLE ====== --}}
        <h1
            class="font-serif font-semibold text-[3rem] sm:text-[6rem] font-black tracking-tight leading-[1.05] text-neutral-900 mb-12">
            {{ __('works.title') }}
        </h1>

        {{-- ====== PROJECT LIST VIA LIVEWIRE ====== --}}
        <livewire:projects-list lazy />

    </div>
@endsection