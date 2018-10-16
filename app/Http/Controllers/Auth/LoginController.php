<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

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

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


 public function redirectPath()
    {
        if ( method_exists($this, 'redirectTo') ) {
            return $this->redirectTo();
        } else {
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
        }
    }

    protected function redirectTo()
    {
        $isAdmin = (\Auth::user()->is_admin);
        if ($isAdmin) {
            return  '/admin';
        } else {
            return  '/home';
        }
    }
    
}
