<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincia::all();

        $provinciasMapeadas = $provincias->map(function($provincia){
            return [
                'id' => $provincia->id,
                'nombre' => $provincia->nombre,
            ];
        });

        return response()->json($provinciasMapeadas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Provincia $provincia)
    {
        //
    }

    public function edit(Provincia $provincia)
    {
        //
    }

    public function update(Request $request, Provincia $provincia)
    {
        //
    }

    public function destroy(Provincia $provincia)
    {
        //
    }
}
