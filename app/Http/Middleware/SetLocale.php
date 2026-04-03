<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if ($locale && in_array($locale, ['id', 'en'])) {
            app()->setLocale($locale);
            session(['locale' => $locale]);

            // Set URL default so all route() calls get this parameter
            \Illuminate\Support\Facades\URL::defaults(['locale' => $locale]);

            // Forget it so it doesn't get passed to controller methods
            $request->route()->forgetParameter('locale');
        } elseif (!$locale) {
            // Fallback just in case
            $sessionLocale = $request->session()->get('locale', config('app.locale'));
            app()->setLocale($sessionLocale);
        }

        return $next($request);
    }
}
