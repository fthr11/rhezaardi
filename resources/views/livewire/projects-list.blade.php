<div x-data="{ openCategory: false, openSort: false }">
    <!-- Filter & Sort Controls -->
    <div class="flex flex-wrap items-center gap-4 mb-10">
        <!-- Category Dropdown -->
        <div class="relative">
            <button @click="openCategory = !openCategory" @click.away="openCategory = false"
                class="flex items-center gap-2 px-5 py-2.5 bg-white border border-neutral-200 rounded-full text-[13.5px] font-medium hover:border-neutral-900 transition-all duration-300">
                <span>{{ $category ? ($categories->find($category)->name ?? __('Category')) : __('All Categories') }}</span>
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
    </div>

    <!-- Skeleton Loading Grid (shown during updates) -->
    <div wire:loading.grid wire:target="setCategory, setSort, gotoPage"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-12">
        @foreach (range(1, max(3, count($projects))) as $i)
            <x-skeleton-card />
        @endforeach
    </div>

    <!-- Project Grid (hidden during updates) -->
    <div wire:loading.remove wire:target="setCategory, setSort, gotoPage">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-12">
            @forelse ($projects as $project)
                <x-card :item="$project" type="work" :imgLoading="$loop->iteration <= 3 ? 'eager' : 'lazy'"
                    :imgPriority="$loop->iteration <= 3 ? 'high' : 'auto'" />
            @empty
                <div class="col-span-full py-20 text-center text-neutral-400">
                    {{ __('No projects found in this category.') }}
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
        <div class="mt-16 text-center">
            <button wire:click="loadMore"
                class="px-8 py-3 bg-neutral-900 text-white rounded-full text-[14px] font-medium hover:bg-black transition-all disabled:opacity-50"
                wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="loadMore">{{ __('Load More') }}</span>
                <span wire:loading wire:target="loadMore">{{ __('Loading...') }}</span>
            </button>
        </div>
    @endif
</div>