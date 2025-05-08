<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use SoftDeletes;

    protected $table = 'provincias';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'nombre',
        'codigo'
    ];
}
