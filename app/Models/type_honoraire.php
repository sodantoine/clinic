<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class type_honoraire extends Model
{
    protected $fillable=['libelle','prix'];
    public function honoraire(){
        return $this->hasMany('App\Models\honoraire','id_type_honoraire','id');
    }
}
