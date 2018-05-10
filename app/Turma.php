<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';
    protected $primaryKey = 'idturma';

    public function historicos()
    {
        return $this->hasMany('App\Historico');
    }
    public function treinamento(){
    	return $this->belongsTo('App\Treinameto','idtreinamento','idtreinamento');
    }
}
