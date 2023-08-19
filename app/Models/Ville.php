<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ville extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','gouvernorat_id'
    ];

    public function gouvernorat()
    {
        return $this->hasOne('App\Models\Gouvernorat','gouvernorat_id');
    }
}
