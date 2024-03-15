<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return redirect()->route('admin')->with('error', 'User tidak mempunyai hak akses.');
        }

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if (auth()->user()->hasAnyRole($roles) && $roles !== null) {
            return $next($request);
        }

        return redirect()->route('admin')->with('error', 'User tidak mempunyai hak akses.');
    }

}
