<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       // $this->middleware('guest:admin')->except('logout');
      //  $this->middleware('guest:user')->except('logout');

    }

    public function username()
    {
       // return 'phone';
        $value = request() -> input ('identify'); // aa@aa.com or 523361
        $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

       /* $field ='';
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }else$field = 'phone';*/

        request()->merge([$field =>$value]);
        return $field;
    }
}
