<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    /**
     * Muestra una lista de todas las provincias.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $provincias = Provincia::all();

        $provinciasMapeadas = $provincias->map(function ($provincia) {
            return [
                'id' => $provincia->id,
                'nombre' => $provincia->nombre, // Asegurate que este campo existe en tu base
            ];
        });

        return response()->json($provinciasMapeadas);
    }

    /**
     * Muestra el formulario para crear una nueva provincia.
     */
    public function create()
    {
        //
    }

    /**
     * Almacena una nueva provincia en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Muestra una provincia específica.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //
    }

    /**
     * Muestra el formulario para editar una provincia específica.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        //
    }

    /**
     * Actualiza una provincia específica en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia)
    {
        //
    }

    /**
     * Elimina una provincia específica de la base de datos.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincia $provincia)
    {
        //
    }
    /**
    * Muestra todas las provincias con sus tickets asociados.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function provinciasConTikets()
    {
    $provincias = Provincia::with('tikets')->get();

    return response()->json($provincias);
    }
}
