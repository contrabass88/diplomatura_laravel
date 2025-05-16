<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tiket;

class TiketSeeder extends Seeder
{
    public function run()
    {
        Tiket::create([
            'titulo' => 'Problema con el login',
            'descripcion' => 'No se puede ingresar con usuario registrado',
            'usuario_id' => 1
        ]);

        Tiket::create([
            'titulo' => 'Error en carga de datos',
            'descripcion' => 'No aparecen los registros correctamente',
            'usuario_id' => 2
        ]);
    }
}
