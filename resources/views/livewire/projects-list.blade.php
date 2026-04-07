<div x-data="{ openCategory: false, openSort: false }">

    <!-- Filter Bar: Category and Sorting -->
    <div class="flex flex-wrap items-center gap-4 mb-10">
        <!-- Category Dropdown -->
        <div class="relative">
            <button @click="openCategory = !openCategory" @click.away="openCategory = false"
                class="flex items-center gap-2 px-5 py-2.5 bg-white border border-neutral-200 rounded-full text-[13.5px] font-medium hover:border-neutral-900 transition-all duration-300">
                <span>{{ $category ? ($categories->find($category)?->name ?? __('Category')) : __('All Categories') }}</span>
                <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': openCategory }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="openCategory" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="absolute left-0 mt-2 w-56 bg-white border border-neutral-200 rounded-2xl shadow-xl z-20 py-2 overflow-hidden">
                <button wire:click="setCategory('')" @click="openCategory = false"
                    class="w-full text-left px-4 py-2 text-[13px] hover:bg-neutral-50 {{ $category === '' ? 'font-bold' : '' }}">
                    {{ __('All Categories') }}
                </button>
                @foreach ($categories as $cat)
                    <button wire:click="setCategory('{{ $cat->id }}')" @click="openCategory = false"
                        class="w-full text-left px-4 py-2 text-[13px] hover:bg-neutral-50 {{ $category == $cat->id ? 'font-bold' : '' }}">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Sort Dropdown -->
        <div class="relative">
            <button @click="openSort = !openSort" @click.away="openSort = false"
                class="flex items-center gap-2 px-5 py-2.5 bg-white border border-neutral-200 rounded-full text-[13.5px] font-medium hover:border-neutral-900 transition-all duration-300">
                <span>{{ $sort === 'latest' ? __('Latest') : __('Oldest') }}</span>
                <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': openSort }" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="openSort" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="absolute left-0 mt-2 w-40 bg-white border border-neutral-200 rounded-2xl shadow-xl z-20 py-2 overflow-hidden">
                <button wire:click="setSort('latest')" @click="openSort = false"
                    class="w-full text-left px-4 py-2 text-[13px] hover:bg-neutral-50 {{ $sort === 'latest' ? 'font-bold' : '' }}">
                    {{ __('Latest') }}
                </button>
                <button wire:click="setSort('oldest')" @click="openSort = false"
                    class="w-full text-left px-4 py-2 text-[13px] hover:bg-neutral-50 {{ $sort === 'oldest' ? 'font-bold' : '' }}">
                    {{ __('Oldest') }}
                </button>
            </div>
        </div>

        {{-- ====== Active Category Badge (Beside Sort) ====== --}}
        @if ($category)
            @php $currentCat = $categories->find($category); @endphp
            @if ($currentCat)
                <div
                    class="flex items-center gap-2 bg-neutral-900 text-white px-4 py-2.5 rounded-full text-[13px] font-medium animate-in fade-in slide-in-from-left-2 duration-300 shadow-sm">
                    <span class="opacity-70 text-[10px] uppercase tracking-widest font-bold mr-0.5">{{ __('Category') }}:</span>
                    <span class="font-semibold">{{ $currentCat->name }}</span>
                    <button wire:click="setCategory('')" class="ml-1 opacity-60 hover:opacity-100 transition-opacity"
                        aria-label="Clear category filter">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif
        @endif
    </div>

    <!-- Active Filter Title -->
    @if ($category)
        @php $currentCat = $categories->find($category); @endphp
        @if ($currentCat)
            <div class="mb-8 block animate-in fade-in duration-500">
                <h2 class="text-[15px] text-neutral-500 font-medium">
                    {{ __('results') }}: <span class="text-neutral-900 border-b border-neutral-300">{{ $currentCat->name }}</span>
                </h2>
            </div>
        @endif
    @endif

    <!-- Skeleton Loading Grid -->
    <div wire:loading.grid wire:target="setCategory, setSort, gotoPage"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-12">
        @foreach (range(1, max(3, count($projects))) as $i)
            <x-skeleton-card />
        @endforeach
    </div>

    <!-- Project Grid -->
    <div wire:loading.remove wire:target="setCategory, setSort, gotoPage">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-12">
            @forelse ($projects as $project)
                <x-card :item="$project" type="work" :imgLoading="$loop->iteration <= 3 ? 'eager' : 'lazy'"
                    :imgPriority="$loop->iteration <= 3 ? 'high' : 'auto'" />
            @empty
                <div class="col-span-full py-24 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-neutral-50 mb-4 ">
                        <svg class="w-6 h-6 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <p class="text-[14px] text-neutral-400">
                        {{ __('No projects found in this category.') }}
                    </p>
                    @if ($category)
                        <button wire:click="setCategory('')"
                            class="mt-4 text-[13px] text-neutral-900 font-semibold border-b border-neutral-900 hover:text-neutral-500 hover:border-neutral-500 transition-colors">
                            {{ __('Show all projects') }}
                        </button>
                    @endif
                </div>
            @endforelse

            <!-- Load More Skeleton -->
            <div wire:loading.grid wire:target="loadMore"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-12 col-span-full">
                @foreach (range(1, 6) as $i)
                    <x-skeleton-card />
                @endforeach
            </div>
        </div>
    </div>

    <!-- Load More Button -->
    @if ($projects->hasMorePages())
        <div class="mt-20 text-center">
            <button wire:click="loadMore"
                class="px-8 py-3.5 bg-neutral-900 text-white rounded-full text-[14px] font-medium hover:bg-black transition-all hover:scale-105 active:scale-95 disabled:opacity-50"
                wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="loadMore">{{ __('Load More') }}</span>
                <span wire:loading wire:target="loadMore">
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    {{ __('Loading...') }}
                </span>
            </button>
        </div>
    @endif
</div>