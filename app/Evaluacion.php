<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $primaryKey = 'id_evaluacion';
    protected $fillable = ['id_asignacriterio','id_etapa','id_proyecto','valor'];


    function getAsignaCriterio()
    {
        return $this->hasMany('App\AsignaCriterio','id_asignacriterio','id_asignacriterio');
    }
    function getEtapa()
    {
        return $this->hasMany('App\Etapa','id_etapa','id_etapa');
    }
    function getProyecto()
    {
        return $this->hasMany('App\Proyecto','id_proyecto','id_proyecto');
    }
}
