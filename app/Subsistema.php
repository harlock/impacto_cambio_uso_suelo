<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsistema extends Model
{
    protected $table = 'subsistemas';
    protected $primaryKey = 'id_subsistema';
    protected $fillable = ['nombre_subsistema'];
}
