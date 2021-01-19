<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table = 'criterios';
    protected $primaryKey = 'id_criterio';
    protected $fillable = ['descripcion'];
}
