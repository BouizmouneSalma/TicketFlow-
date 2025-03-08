<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!in_array(Auth::user()->type, $types)) {
            abort(403, 'Accès interdit.');
        }

        return $next($request);
    }
}




