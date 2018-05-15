<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulo';
    protected $primaryKey = 'idmodulo';

    public function treinamento(){
    	return $this->belongsTo('App\Treinameto','idtreinamento','idtreinamento');
    }

    public function professor(){
    	return $this->hasOne('App\Professor');
    }
}
