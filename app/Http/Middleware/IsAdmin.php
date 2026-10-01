<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Utente non loggato
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Utente loggato ma non admin
        if (!Auth::user()->is_admin) {
            abort(403, 'Non sei autorizzato ad accedere a questa pagina.');
        }
        return $next($request);
    }
}
