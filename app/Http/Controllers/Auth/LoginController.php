<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected  $auth;
    public function __construct(Guard $guard)
    {
        $this->auth=$guard;
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/home/stock';

    protected function redirectTo()
    {
        if ($this->auth->user()->group_id==1){
            return '/admin/fujiservice';
        }elseif ($this->auth->user()->group_id==2){
            return '/';
        }else{
            return '/';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

}
