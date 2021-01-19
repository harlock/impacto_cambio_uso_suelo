<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    protected $table = 'colonias';
    protected $primaryKey = 'id_colonia';
    protected $fillable = ['nombre_colonia','id_municipio','codigo_postal'];

    function getMunicipio()
    {
        return $this->hasMany('App\Municipio','id_municipio','id_municipio');
    }
}

