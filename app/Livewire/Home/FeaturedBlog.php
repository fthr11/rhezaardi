<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class FeaturedBlog extends Component
{
    public function placeholder()
    {
        return view('components.skeleton-featured');
    }

    public function render()
    {
        $featuredBlogs = Cache::remember('featured_blogs_' . app()->getLocale(), 3600, function () {
            return Blog::select(['id', 'slugEN', 'slugID', 'created_at', 'contentEN', 'contentID', 'titleEN', 'titleID', 'thumbnail'])
                ->latest()
                ->take(1)
                ->get();
        });

        return view('livewire.home.featured-blog', [
            'featuredBlogs' => $featuredBlogs
        ]);
    }
}
