<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Immobilier;

class Photos extends Model
{
    use Notifiable;

    public $table = "photos";


    protected $fillable = [
        'name', 'path',

    ];


    public function immobphoto()
    {
        return $this->belongsToMany('App\Models\Immobilier','immob_photo','id_photo','id_immob');
     }
}
