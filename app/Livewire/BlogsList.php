<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class BlogsList extends Component
{
    use WithPagination;

    public $sort = 'newest';
    public $perPage = 6;

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function setSort($s)
    {
        $this->sort = $s;
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('livewire.home.placeholder-grid');
    }

    public function render()
    {
        $query = Blog::query()->select(['id', 'slugEN', 'slugID', 'titleEN', 'titleID', 'contentEN', 'contentID', 'thumbnail', 'created_at']);

        // Sort options: newest, oldest, or numeric year
        if ($this->sort === 'newest' || $this->sort === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif (is_numeric($this->sort)) {
            $query->whereYear('created_at', (int) $this->sort)->orderBy('created_at', 'desc');
        }

        // Optimize: Get years directly from database instead of model hydration
        // Use caching to further reduce CPU and DB load
        $availableYears = \Illuminate\Support\Facades\Cache::remember('blog_available_years', 3600, function () {
            return Blog::selectRaw('YEAR(created_at) as year')
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year')
                ->toArray();
        });

        $blogs = $query->paginate($this->perPage);

        return view('livewire.blogs-list', [
            'blogs' => $blogs,
            'availableYears' => $availableYears
        ]);
    }
}
