<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    protected $fillable=[ 'motif','observations','diagnostic','date_consultation','patient_id'];
    public function patient(){
        //return $this->belongsTo('App\Models\patient','patient_id','id');
        return $this->belongsTo('App\Models\patient');

    }
}
