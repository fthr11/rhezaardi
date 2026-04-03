<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class Project extends Model
{
    protected $fillable = [
        "titleEN",
        "titleID",
        "slugEN",
        "slugID",
        "descriptionEN",
        "descriptionID",
        "thumbnail",
        "images",
        "embed",
        "project_category_id"
    ];

    protected $casts = [
        "images" => "array",
        "embed" => "array",
    ];

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'id' ? $this->titleID : $this->titleEN;
    }

    public function getSlugAttribute()
    {
        return app()->getLocale() === 'id' ? $this->slugID : $this->slugEN;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'id' ? $this->descriptionID : $this->descriptionEN;
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('latest_projects_id');
            Cache::forget('latest_projects_en');
        });

        static::deleted(function (Project $project) {
            Cache::forget('latest_projects_id');
            Cache::forget('latest_projects_en');

            if ($project->thumbnail) {
                Storage::disk('projects')->delete($project->thumbnail);
            }

            if ($project->images) {
                Storage::disk('projects')->delete($project->images);
            }
        });
    }
}

