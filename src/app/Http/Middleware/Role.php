<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();

        // if($user->isAdmin())
        //     return $next($request);

        // Check if user has the role This check will depend on how your roles are set up
        if (in_array($user->hasRole($role), $roles)
            return $next($request);

        return redirect('login');
    }
}
