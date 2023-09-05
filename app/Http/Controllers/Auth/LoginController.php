<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

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

    public function  Login(Request $request)
    {
        try {
            $request->validate([
                'identify' => ['required'],
                'password' => ['required', 'min:8'],
            ]);
            $identify = $this->username();
            /** @var TYPE_NAME $creds */
            $creds = $request->only([$identify, 'password']);

            if (Auth::guard('web')->attempt($creds)) {
                return redirect()->route('user.home');
            } elseif (Auth::guard('web')->attempt($creds)) {
                return redirect()->route('admin.home');
            } elseif (Auth::guard('admin')->attempt($creds)) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('showLoginForm')->with('fail', 'Verifier le mot de passe');
            }
        } catch (Exception $exception) {
        }
    }
    public function username()
    {
        // return 'phone';
        $value = request()->input('identify'); // aa@aa.com or 523361
        $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        /* $field ='';
         if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
             $field = 'email';
         }else$field = 'phone';*/

        request()->merge([$field => $value]);
        return $field;
    }
}
