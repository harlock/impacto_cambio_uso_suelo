<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $table = 'etapas';
    protected $primaryKey = 'id_etapa';
    protected $fillable = ['etapa'];
}
