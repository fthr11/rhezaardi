<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach ($latestProjects as $project)
            <x-card :item="$project" type="work" />
        @endforeach
    </div>
</div>