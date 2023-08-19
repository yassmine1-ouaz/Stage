<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TypeImmob extends Model
{
     use Notifiable;

    public $table = "type_immob";


    protected $fillable = [
        'id', 'type'

    ];
}
