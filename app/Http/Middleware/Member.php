<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Member
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
        $auth = Auth::check();
        if($auth){
            $user = Auth::user();
            $member = $user->role === 'member';
            if($member){
                return $next($request);
            }
        }
        abort(403);
    }
}
