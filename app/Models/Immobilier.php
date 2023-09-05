<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Immobilier extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'immob_type', 'user_id', 'etat', 'surface', 'ville_id', 'description', 'prix', 'status',
    ];





    public function typeImmob()
    {
        return $this->belongsTo('App\Models\TypeImmob', 'immob_type');
    }


    public function images()
    {
        return $this->belongsToMany('App\Models\Photos', 'immob_photo', 'id_immob', 'id_photo');
    }



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function Villes()
    {
        return $this->belongsTo('App\Models\Ville', 'ville_id');
    }


   /* public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

   public function comments()
    {
        return $this->hasMany('App\Models\Commentaire');
    }*/
}
