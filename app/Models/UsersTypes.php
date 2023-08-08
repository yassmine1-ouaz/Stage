<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class UsersTypes extends Model
{

    use Notifiable;

    public $table = "user_types";


    protected $fillable = [
        'name',

    ];


}
