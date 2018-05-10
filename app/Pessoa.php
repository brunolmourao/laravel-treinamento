<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $primaryKey = 'idpessoas';

    public function historicos()
    {
        return $this->hasMany('App\Historico');
    }
}
