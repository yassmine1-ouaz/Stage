<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'immob_id', 'message', 'reserv_date', 'status',
    ];


    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function immobilier()
    {
        return $this->belongsTo('App\Models\Immobilier', 'immob_id', 'id');
    }

    
}
