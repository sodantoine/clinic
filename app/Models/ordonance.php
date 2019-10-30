<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordonance extends Model
{
   
    public function patient(){
        return $this->belongsTo('App\Models\patient');

    }

    public function produit(){
        return $this->belongsTo('App\Models\produit');

    }
    public function prescrire(){
    	return $this->hasMany('App\Models\prescrire');
    }
}
