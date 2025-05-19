<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use SoftDeletes;

    protected $table = 'provincias'; /* el modelo provincia se va a relacionar con la tabla provincia que se crea en la BD*/
    protected $primaryKey = 'id';
    public $incrementing = true; /* el id va a ser autoincremental*/

    protected $fillable = [  /*atributo es un array donde se coloca todos los campos que tiene una tabla menos el id*/
        'nombre',
        'codigo'
    ];
}
 