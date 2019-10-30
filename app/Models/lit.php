<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lit extends Model
{
    protected $fillable=['lit_nom'];
    public function chambre(){
        return $this->belongsTo('App\chambre');
    }
}
