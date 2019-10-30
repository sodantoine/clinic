<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected  $fillable=[ 'last_name', 'first_name', 'sex', 'date_of_birth','phone_number','family_state','groupe_sanguin','taille'];
    public function consultations(){
        return $this->hasMany('App\Models\consultation','patient_id','id');
    }
    public function honoraire(){
        return $this->hasMany('App\Models\honoraire','patient_id','id');
    }
    public function ordonnances(){
        return $this->hasMany('App\Models\ordonance');

    }
    public function soins(){
        return $this->hasMany('App\soin','patient_id','id');
    }
    public function constantes(){
        return $this->hasMany('App\Models\Constante','patient_id','id');
    }
}
