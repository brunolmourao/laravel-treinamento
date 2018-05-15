<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';
    protected $primaryKey = 'idprofessor';

    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa','idpessoas','idpessoas');
    }
    public function modulo(){
    	return $this->belongsTo('App\Modulo','idmodulo','idmodulo');
    }
}
