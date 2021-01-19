<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaCriterio extends Model
{
    protected $table = 'asigna_criterios';
    protected $primaryKey = 'id_asignacriterio';
    protected $fillable = ['id_factor','id_criterio'];

    function getFactoresAmbientales()
    {
        return $this->hasMany('App\FactorAmbiental','id_factor','id_factor');
    }
    function getCriterio()
    {
        return $this->hasMany('App\Criterio','id_criterio','id_criterio');
    }
}
