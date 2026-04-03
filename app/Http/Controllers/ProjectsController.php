<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('works.index');
    }

    public function show($slug)
    {
        $project = Project::where('slugEN', $slug)->orWhere('slugID', $slug)->firstOrFail();
        $related = Project::where('id', '!=', $project->id)->latest()->take(2)->get();
        return view('works.show', compact('project', 'related'));
    }
}
