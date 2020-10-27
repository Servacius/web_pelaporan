<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, String $role) {
        if (!Auth::check()) {
            return redirect('/home');
        }

        $user = Auth::user();
        if($user->account_type_id == $role) {
            return $next($request);
        }
        return redirect('/home');
    }

}
