<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'id_municipio';
    protected $fillable = ['nombre','id_estado'];

    function getEstado()
    {
        return $this->hasMany('App\Estado','id_estado','id_estado');
    }
}
