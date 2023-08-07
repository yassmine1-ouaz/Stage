<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class VerifyUser extends Model
{

    use Notifiable;

    public $table = "verify_users";

    protected $fillable = [
        'user_id' ,
        'token',
    ];

    public function user(){

return $this->belongsTo(User::class);
    }
}
