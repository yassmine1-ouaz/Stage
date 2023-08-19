<?php

namespace App\Http\Controllers;

use App\Models\ImmobPhoto;
use App\Models\Photos;
use App\Models\VerifyUser;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

    public function createToken($user_id, $email)
    {
        $verify_user = new VerifyUser();
        $verify_user->user_id = $user_id;
        $verify_user->token = Str::random(40);

        /* $message = 'Dear <b>' .$request->name.'</b>';
         $message.= 'Thanks for signing up, we hust need you to verify your email address to complete your setting up your account.';
 */
        /* $email = [
             'recipient'=>$request->email,
             'fromEmail'=>$request->email,
             'fromName'=>$request->name,
             'subject'=>'Email Verification',
             'body'=>$message,
             //'actionLink'=>$VerifyURL,
         ];*/

        if ($verify_user->save()) {
            Mail::send('email.emailVerification', ['token' => $verify_user->token], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Email Verification Mail');
            });
        }
    }

    public function mediaFiles($files, $path, $immo_id)
    {

        foreach ($files as $file) {
            $image = new Photos();
            $image->name = $file->getClientOriginalName();
            $image->path = $file->move($path, $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension());

            //$image[] = $files;
            if ($image->save()) {
                $ImmoPhoto = new ImmobPhoto();
                $ImmoPhoto->id_photo = $image->id;
                $ImmoPhoto->id_immob = $immo_id;
                $ImmoPhoto->save();

            }
        }
    }
}
