<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestrictRegistrationToOneAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('users')->select('role')->where('id',1)->first();

        if ($user && (int)$user->role === 1){
            // fail and redirect silently if we already have a user with that role
            return response('User Super-Admin allready exist','409');
        }

        return $next($request);
    }
}
