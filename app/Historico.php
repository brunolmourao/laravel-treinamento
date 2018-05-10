<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';
    protected $primaryKey = 'idhistorico';

    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa' ,'idpessoas', 'idpessoas');
    }
    public function turma()
    {
        return $this->belongsTo('App\Turma', 'idturma','idturma');
    }
}
