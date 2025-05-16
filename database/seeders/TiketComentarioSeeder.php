<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TiketComentario;

class TiketComentarioSeeder extends Seeder
{
    public function run()
    {
        TiketComentario::create([
            'comentario' => 'Estamos revisando el problema',
            'tiket_id' => 1,
            'usuario_id' => 2,
        ]);

        TiketComentario::create([
            'comentario' => 'Por favor intente reiniciar sesión',
            'tiket_id' => 1,
            'usuario_id' => 1,
        ]);
    }
}
