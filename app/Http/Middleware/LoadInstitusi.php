<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Institusi;

class LoadInstitusi
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $institusiSlug = $request->route('institusiSlug');

        if ($institusiSlug) {
            $institusi = Institusi::where('slug', $institusiSlug)->first();
            view()->share('institusi', $institusi);
        } else {
            view()->share('institusi', null);
        }

        return $next($request);
    }
}
