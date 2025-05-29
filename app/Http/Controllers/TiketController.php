<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Provincia;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tickets = Tiket::all();
        $tickets = Tiket::with('provincia')->get();
        $tickets = $tickets->map(function ($ticket) {
            return [
                'id' => $ticket->id,
                'nombre' => $ticket->nombre,
                'provincia' => $ticket->provincia->nombre
            ];
        });
        return response()->json($tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Tiket::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'provincia_id' => $request->provincia_id
        ]);

        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Tiket::with('provincia')->withTrashed()->find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Tiket no encontrado'], 404);
        }

        return response()->json([
            'id' => $ticket->id,
            'nombre' => $ticket->nombre,
            'descripcion' => $ticket->descripcion,
            'provincia' => $ticket->provincia->nombre,
            'eliminado' => $ticket->deleted_at !== null,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->update($request->all());

        return response()->json([
            'message' => 'Tiket actualizado correctamente',
            'data' => $tiket
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiket $tiket)
    {
        $tiket->delete();

        return response()->json([
            'message' => 'Tiket eliminado correctamente'
        ]);
    }
    public function getProvinciaTikets($id)
    {
        $provincia = Provincia::with('tikets')->find($id);

        if (!$provincia) {
            return response()->json(['message' => 'Provincia no encontrada'], 404);
        }

        $tikets = $provincia->tikets->map(function ($tiket) {
            return [
                'nombre' => $tiket->nombre,
                'descripcion' => $tiket->descripcion,
            ];
        });

        return response()->json([
            'provincia' => $provincia->nombre,
            'tikets' => $tikets
        ]);
    }
}
