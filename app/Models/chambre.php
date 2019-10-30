<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chambre extends Model
{
    protected $fillable=['chambre_nom'];
    public function lit(){
        return $this->hasMany('App\lit');
    }
}
