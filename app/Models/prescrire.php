<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prescrire extends Model
{
     protected $fillable=['posologie','quantite'];

    public function ordonance(){
        return $this->belongsTo('App\Models\ordonance');

    }
}
