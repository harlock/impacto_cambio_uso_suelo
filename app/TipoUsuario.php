<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipos_usuarios';
    protected $primaryKey = 'id_tipo';
    protected $fillable = ['descripcion'];
}
