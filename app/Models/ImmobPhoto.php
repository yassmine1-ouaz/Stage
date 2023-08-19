<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImmobPhoto extends Model
{
    use Notifiable;
    protected $table ='immob_photo';
    public $timestamps = false;

    protected $fillable = [
        'id_immob', 'id_photo',

    ];
}
