<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soin extends Model
{
    //
    public function patient(){
        return $this->belongsTo('App\Models\patient');

    }

    public function prescrire(){
        return $this->hasMany('App\Prescrire_soin');

    }
    
}
