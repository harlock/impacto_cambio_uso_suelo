<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre_proyecto','descripcion','id_compania','id_tipoproyecto','id_colonia','fecha','id_user'];


    function getTipoProyecto()
    {
        return $this->hasMany('App\TipoProyecto','id_tipoproyecto','id_tipoproyecto');
    }
    function getColonia()
    {
        return $this->hasMany('App\Colonia','id_colonia','id_colonia');
    }
    function getCompania()
    {
        return $this->hasMany('App\Compania','id_compania','id_compania');
    }
}
