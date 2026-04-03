<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class LatestBlogs extends Component
{
    public function placeholder()
    {
        return view('livewire.home.placeholder-grid');
    }

    public function render()
    {
        $latestBlogs = Cache::remember('latest_blogs_' . app()->getLocale(), 3600, function () {
            return Blog::select(['slugEN', 'slugID', 'created_at', 'contentEN', 'contentID', 'titleEN', 'titleID', 'thumbnail'])
                ->latest()
                ->skip(1)
                ->take(3)
                ->get();
        });

        return view('livewire.home.latest-blogs', [
            'latestBlogs' => $latestBlogs
        ]);
    }
}
