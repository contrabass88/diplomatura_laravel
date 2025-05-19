<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Tiket;


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

    public function users()
    {
        return $this->hasMany(User::class, 'provincia_id', 'id');
    }

    public function tikets()    
    {
    return $this->hasMany(Tiket::class, 'provincia_id', 'id');
    }      

}
