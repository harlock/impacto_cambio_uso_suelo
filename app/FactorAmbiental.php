<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactorAmbiental extends Model
{
    protected $table = 'factores_ambientales';
    protected $primaryKey = 'id_factor';
    protected $fillable = ['nombre_factor','id_variable'];

    function getVariable()
    {
        return $this->hasMany('App\Variable', 'id_variable', 'id_variable');
    }
}
