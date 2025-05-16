<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiketComentario extends Model
{
    use SoftDeletes;

    protected $table = 'tiket_comentarios';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'comentario',
        'usuario_id',
        'tiket_id'
    ];

    // Relación: cada comentario pertenece a un tiket
    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }

    // Relación: cada comentario pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
