<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class LatestProjects extends Component
{
    public function placeholder()
    {
        return view('livewire.home.placeholder-grid');
    }

    public function render()
    {
        $latestProjects = Cache::remember('latest_projects_' . app()->getLocale(), 3600, function () {
            return Project::select(['id', 'titleEN', 'titleID', 'slugEN', 'slugID', 'descriptionEN', 'descriptionID', 'thumbnail', 'project_category_id', 'created_at'])
                ->latest()
                ->take(3)
                ->get();
        });

        return view('livewire.home.latest-projects', [
            'latestProjects' => $latestProjects
        ]);
    }
}
