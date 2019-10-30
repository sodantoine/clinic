<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescrire_soin extends Model
{
    //
    public function soin(){
        return $this->belongsTo('App\soin');

    }
}
