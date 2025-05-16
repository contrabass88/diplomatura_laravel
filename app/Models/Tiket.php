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
        'titulo',
        'descripcion',
        'estado',
        'usuario_id'
    ];

    // Relación: un tiket pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación: un tiket puede tener muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(TiketComentario::class, 'tiket_id');
    }
}
