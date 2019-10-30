<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class honoraire extends Model
{
    protected $fillable=['paye','reste','id_type_honoraire'];

    public function patient(){
        return $this->belongsTo('App\Models\patient','patient_id','id');
    }
    public function type_honoraire(){
        return $this->belongsTo('App\Models\type_honoraire','id_type_honoraire','id');
    }
}
