<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Gouvernorat extends Model
{
    use Notifiable;

    public $table = "gouvernorat";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ville_id',
    ];


}
