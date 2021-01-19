<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variables';
    protected $primaryKey = 'id_variable';
    protected $fillable = ['nombre_variable','id_subsistema'];

    function getSubsistema()
    {
        return $this->hasMany('App\Subsistema', 'id_subsistema', 'id_subsistema');
    }
}
