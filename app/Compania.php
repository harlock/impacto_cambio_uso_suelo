<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    protected $table = 'companias';
    protected $primaryKey = 'id_compania';
    protected $fillable = ['nombre_compania'];
}
