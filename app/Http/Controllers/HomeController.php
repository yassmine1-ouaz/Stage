<?php

namespace App\Http\Controllers;

use App\Models\UsersTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('authinterfaces' ); //user must be authenticated
    }

    public function showLoginForm(){
        return view('authinterfaces.login')->withTitle('Login');
    }
    public function showRegisterForm(){
        $types = UsersTypes::get();
        return view('authinterfaces.register',['types'=>$types])->withTitle('Register');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        return view('dashboard.admin.home');
        return view('dashboard.user.home');


    }

    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->userType == '0')
            {
                return view('user.home');
            }
            else
            {
                return view('admin.home');
            }
        }
    }
}
