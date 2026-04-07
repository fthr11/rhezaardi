<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Cache;

class ProjectsList extends Component
{
    use WithPagination;

    #[Url(as: 'category', history: true, keep: true)]
    public $category = '';

    #[Url(as: 'sort', history: true, keep: true)]
    public $sort = 'latest';

    public $perPage = 6;

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function setCategory($cat)
    {
        $this->category = $cat;
        $this->resetPage();
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
        // Cache categories as they rarely change
        $categories = Cache::remember('project_categories_list', 3600, function () {
            return ProjectCategory::all();
        });

        $query = Project::query()
            ->select(['id', 'slugEN', 'slugID', 'titleEN', 'titleID', 'descriptionEN', 'descriptionID', 'thumbnail', 'created_at', 'project_category_id'])
            ->with(['category:id,nameEN,nameID']);

        // category filter by ID
        if (!empty($this->category)) {
            $query->where('project_category_id', $this->category);
        }

        // sorting
        if ($this->sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $projects = $query->paginate($this->perPage);

        return view('livewire.projects-list', [
            'projects' => $projects,
            'categories' => $categories
        ]);
    }
}
