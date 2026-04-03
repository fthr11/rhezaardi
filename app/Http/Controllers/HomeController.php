<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
