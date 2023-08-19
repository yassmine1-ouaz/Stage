<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Publication extends Model
{
    use Notifiable;

    public $table = "pub_comments";


    protected $fillable = [
        'user_id', 'commentaire', 'immob_id',

    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function immobilier(){
        return $this->belongsTo('App\Models\Immobilier');
    }
}
