<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Commentaire extends Model
{
    use Notifiable;

    public $table = "pub_comments";


    protected $fillable = [
        'user_id', 'immob_id', 'commentaire',

    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function immobilier()
    {
        return $this->belongsTo('App\Models\Immobilier', 'immob_id', 'id');
    }
}
