<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treinamento extends Model
{
    protected $table = 'Treinamento';
    protected $primaryKey = 'idtreinamento';

    public function turma(){
    	return $this->hasOne('App\Turma','idturma','idturma');
    }
}
