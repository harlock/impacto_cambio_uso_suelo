<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
    protected $table = 'tipo_proyectos';
    protected $primaryKey = 'id_tipoproyecto';
    protected $fillable = ['nombre_proyecto'];
}
