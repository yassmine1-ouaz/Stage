<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */

    function create(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        if ($user->save()) {
            $this->createToken($user->id, $user->email);
            return redirect()->back()->with('success', 'You need to verify your account, we have sent you an activation link , please check your email.');
        } else {
            return redirect()->back()->with('fail', 'something went wrong');
        }
    }

    public function verify(Request $request)
    {

        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->email_verified) {
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('showLoginForm')->with('info', 'Your email  is verified successfully, You can now login')->with('verifiedEmail', $user->email);
            } else {
                return redirect()->route('showLoginForm')->with('info', 'Your email is already verified, You can now login')->with('verifiedEmail', $user->email);
            }
        }
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */


    function check(Request $request)
    {
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
        } else {
            return redirect()->route('user.login')->with('fail', 'Verifier le mot de passe');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
