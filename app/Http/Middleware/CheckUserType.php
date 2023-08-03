<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->type) {
                case "Master":
                    return $next($request);
                case "Admin":
                    return redirect('/'); // Lower user
                default:
                    return redirect('/'); // Normal user
            }
        }
        return $next($request);
    }
}
