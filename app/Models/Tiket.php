<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiket extends Model
{
    use SoftDeletes; 

    protected $table = 'tikets';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'nombre',
        'descripcion',
        'provincia_id',
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id', 'id');
    }
}

