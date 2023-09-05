<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Immobilier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;


class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
    }
    //fonction qui permet d'aff la page1
    /*
    public function __construct() {
        $this->middleware('authinterfaces:admin');
    }
    */
    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */

    function create(AdminRequest $request)
    {
        return view('dashboard.admin.home');
    }

    function check(Request $request)
    {
        try {
            $request->validate([
                'identify' => ['required'],
                'password' => ['required', 'min:8'],
            ]);
            $identify = $this->username();

            /** @var TYPE_NAME $creds */
            //$creds = $request->only(['email'=>'admin@admin.com',password=>'123456789']);
            $creds = $request->only([$identify, 'password']);
            if (Auth::guard('admin')->attempt($creds)) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
            }
        } catch (Exception $exception) {
            dd($exception);
        }
    }


    public function showLoginForm()
    {

        return view('dashboard.admin.login')->withTitle('Login');
    }

    public function  Login(Request $request)
    {

        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);

            $email = $request->email;
            $password = $request->password;

            $data = Admin::where('email', $email)->first();
            $check = isset($data) && Hash::check($password, $data->password);
            if ($check) {
                return redirect()->route('admin.home');
            } else {
                return view('dashboard.admin.home');
            }
        } catch (Exception $exception) {
        }
    }



    public function profile()
    {
        return view('dashboard.profile');
    }


    public function BloquerUser(Request $request)
    {

        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['status' => false]);
        }

        // $status = $request->input('status');
        $user->status = $request->input('status');
        //$user->status = $status ? 1 : 0; 
        $user->update();
        //$user->save();
        if ($request->input('status')) {
            $message = 'Active';
            return response()->json(['success' => true, 'id' => $request->id, 'message' => $message]);
        } else {
            $message = 'Blocked';
            return response()->json(['success' => false, 'id' => $request->id, 'message' => $message]);
        }
    }

    public function showUsers()
    {
        $users = User::all();
        return view('dashboard.admin.listusers')->with(['users' => $users]);
    }


    public function showactiveUsers()
    {
        $users = User::where('status', '1')->get();
        $status = Immobilier::all();

        return view('dashboard.user.listuseractive')->with(['users' => $users]);
    }
    public function showblockedUsers()
    {
        $users = User::where('status', '0')->get();

        return view('dashboard.user.listuserblocked')->with(['users' => $users]);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('showUsers')->with('success', 'User a été bien supprimé !');
    }


    public function showImmobiliers()
    {
        //$immobiliers = Immobilier::latest()->paginate(5); /// pagination

        //return view('dashboard.admin.listimmobiliers',compact('immobiliers'))
        //    ->with('i', (request()->input('page', 1) - 1) * 5);
        $immobiliers  = Immobilier::all();

        return view('dashboard.admin.listimmobiliers')->with(['immobiliers' => $immobiliers]);
    }







    public function logout()
    {
        dd('logout');
        Auth::guard('admin')->logout();
        return view('authinterfaces.login')->withTitle('logout');
    }
}
