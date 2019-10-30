<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable=['nom_produit'];
    public function ordonance(){
        return $this->hasMany('App\Models\ordonance','produit_id','id');
    }
}
