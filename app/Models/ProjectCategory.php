<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = [
        'nameID',
        'nameEN',
        'slugID',
        'slugEN'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() === 'id' ? $this->nameID : $this->nameEN;
    }

    public function getSlugAttribute()
    {
        return app()->getLocale() === 'id' ? $this->slugID : $this->slugEN;
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'project_category_id');
    }

    protected static function booted()
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('project_categories');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('project_categories');
        });
    }
}
