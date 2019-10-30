<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class constante extends Model
{
    protected $fillable=['temparature','poids','tension_bras_droit','tension_bras_gauche','pouls'];
    public function consultation(){
    	return $this->belongsTo('App\Models\consultation');
    }

    public function patient(){
    	return $this->belongsTo('App\Models\patient');
    }
}
