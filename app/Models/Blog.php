<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class Blog extends Model
{
    protected $fillable = [
        "titleEN",
        "titleID",
        "slugEN",
        "slugID",
        "contentEN",
        "contentID",
        "thumbnail",
        "images",
        "tags",
        "embed"
    ];

    protected $casts = [
        "images" => "array",
        "tags" => "array",
        "embed" => "array"
    ];

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'id' ? $this->titleID : $this->titleEN;
    }

    public function getSlugAttribute()
    {
        return app()->getLocale() === 'id' ? $this->slugID : $this->slugEN;
    }

    public function getContentAttribute()
    {
        return app()->getLocale() === 'id' ? $this->contentID : $this->contentEN;
    }

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('latest_blogs_id');
            Cache::forget('latest_blogs_en');
            Cache::forget('featured_blogs_id');
            Cache::forget('featured_blogs_en');
            Cache::forget('blog_available_years');
        });

        static::deleted(function (Blog $blog) {
            Cache::forget('latest_blogs_id');
            Cache::forget('latest_blogs_en');
            Cache::forget('featured_blogs_id');
            Cache::forget('featured_blogs_en');
            Cache::forget('blog_available_years');

            if ($blog->thumbnail) {
                Storage::disk('blogs')->delete($blog->thumbnail);
            }

            if ($blog->images) {
                Storage::disk('blogs')->delete($blog->images);
            }
        });
    }
}

