@extends('layouts.app')

@section('title', 'All Blogs | Rheza Ardiansyah')
@section('description', 'All blog posts by Rheza Ardiansyah — stories, insights, and reflections on journalism and storytelling.')

@section('content')
    <div class="max-w-4xl mx-auto px-6 pt-14 sm:pt-16">

        {{-- ====== PAGE TITLE ====== --}}
        <h1
            class="font-serif font-semibold text-[3rem] sm:text-[6rem] font-black tracking-tight leading-[1.05] text-neutral-900 mb-12">
            {{ __('blogs.title') }}
        </h1>

        <livewire:blogs-list lazy />

    </div>
@endsection