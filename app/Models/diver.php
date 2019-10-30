<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class diver extends Model
{
    protected $fillable=['date_fin'];
    public function patient(){
        return $this->belongsTo('App\patient');
    }
}
