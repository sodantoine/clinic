<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hospitalisation extends Model
{
    public function patient(){
        return $this->belongsTo('App\Models\patient','patient_id','id');
    }
    protected $fillable=['motif','id_lit'];
}
