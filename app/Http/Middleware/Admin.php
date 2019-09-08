<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected  $auth;
    public function __construct(Guard $guard)
    {
        $this->auth=$guard;
    }

    public function handle($request, Closure $next,$guard = null)
    {
        //dd(\Route::currentRouteName());
        if (Auth::guard($guard)->guest()){
            return redirect('login');
        }elseif($this->auth->user()->group_id!=1){
            return redirect('login');
        }
        return $next($request);
    }
}
