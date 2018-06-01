<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaRequest extends Model
{
    protected $table = 'turmarequest';
    protected $primaryKey = 'idturmarequest';

    public function pessoa()
    {
        return $this->hasOne('App\Pessoa' ,'idpessoas', 'idpessoas');
    }
    public function turma()
    {
        return $this->hasOne('App\Turma', 'idturma','idturma');
    }
}
