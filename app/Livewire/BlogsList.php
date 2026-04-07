<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class BlogsList extends Component
{
    use WithPagination;

    #[Url(as: 'tag', history: true, keep: true)]
    public $tag = '';

    #[Url(as: 'sort', history: true, keep: true)]
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

    public function setTag($t)
    {
        $this->tag = $t;
        $this->resetPage();
    }

    public function clearTag()
    {
        $this->tag = '';
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('livewire.home.placeholder-grid');
    }

    public function render()
    {
        $query = Blog::query()->select(['id', 'slugEN', 'slugID', 'titleEN', 'titleID', 'contentEN', 'contentID', 'thumbnail', 'tags', 'created_at']);

        // Filter based on Tag
        if (!empty($this->tag)) {
            // We use a grouped OR to catch various JSON string formats depending on the database driver
            $query->where(function ($q) {
                $q->whereJsonContains('tags', $this->tag)
                    ->orWhere('tags', 'like', '%"' . $this->tag . '"%')
                    ->orWhere('tags', 'like', '%[' . $this->tag . ']%'); // Support for simple stringified arrays
            });
        }

        // Sort options: newest, oldest, or numeric year
        if ($this->sort === 'newest' || $this->sort === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($this->sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif (is_numeric($this->sort)) {
            $query->whereYear('created_at', (int) $this->sort)->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Cache for available years
        $availableYears = Cache::remember('blog_available_years_list', 3600, function () {
            return Blog::selectRaw('YEAR(created_at) as year')
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year')
                ->toArray();
        });

        $blogs = $query->paginate($this->perPage);

        return view('livewire.blogs-list', [
            'blogs' => $blogs,
            'availableYears' => $availableYears,
        ]);
    }
}
