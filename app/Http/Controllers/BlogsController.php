<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        $related = Blog::latest()->take(3)->get();
        return view('blogs.index', compact('related'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slugEN', $slug)->orWhere('slugID', $slug)->firstOrFail();
        $related = Blog::where('id', '!=', $blog->id)->latest()->take(2)->get();
        return view('blogs.show', compact('blog', 'related'));
    }
}
