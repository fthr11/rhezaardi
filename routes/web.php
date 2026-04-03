<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProjectsController;

// ── Root Re-direct to default language ──────────────────────────────────────
Route::get('/', function () {
    return redirect('/' . session('locale', config('app.locale')));
});

// ── Localized routes group ───────────────────────────────────────────────────
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|id']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    // ── Blogs
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{slug}', [BlogsController::class, 'show'])->name('blogs.show');

    // ── Projects / Works
    Route::get('/works', [ProjectsController::class, 'index'])->name('works.index');
    Route::get('/works/{slug}', [ProjectsController::class, 'show'])->name('works.show');
});

// ── Language switcher ─────────────────────────────────────────────────────────
Route::post('/{locale}', function (\Illuminate\Http\Request $request) {
    $locale = app()->getLocale(); // Locale is already defined and set by SetLocale middleware

    if (!in_array($locale, ['id', 'en']))
        return redirect()->back();

    session(['locale' => $locale]);
    // app()->setLocale($locale); (already handled by middleware)

    $prev = url()->previous();
    $parsedUrl = parse_url($prev);
    $path = trim($parsedUrl['path'] ?? '/', '/');
    $segments = explode('/', $path);

    if (empty($path)) {
        return redirect()->to('/' . $locale);
    }

    if (in_array($segments[0], ['en', 'id'])) {
        $segments[0] = $locale;
        if (count($segments) >= 3) {
            $section = $segments[1];
            $slug = $segments[2];

            if ($section === 'blogs') {
                $blog = \App\Models\Blog::where('slugEN', $slug)->orWhere('slugID', $slug)->first();
                if ($blog)
                    $segments[2] = $locale === 'id' ? $blog->slugID : $blog->slugEN;
            } elseif ($section === 'works') {
                $project = \App\Models\Project::where('slugEN', $slug)->orWhere('slugID', $slug)->first();
                if ($project)
                    $segments[2] = $locale === 'id' ? $project->slugID : $project->slugEN;
            }
        }
    } else {
        array_unshift($segments, $locale);
    }

    $newUrl = '/' . implode('/', $segments);
    if (!empty($parsedUrl['query'])) {
        $newUrl .= '?' . $parsedUrl['query'];
    }

    return redirect()->to(url($newUrl));
})->name('language.switch');
