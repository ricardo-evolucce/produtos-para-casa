<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Aqui você pode ajustar conforme sua lógica de admin, por exemplo:
        // Supondo que o usuário tenha um campo 'is_admin' booleano
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
