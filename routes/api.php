<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\TiketController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-provincias', [ProvinciaController::class, 'index']);

// Tickets
Route::get('get-tikets', [TiketController::class, 'index']);
Route::get('get-tikets/{id}', [TiketController::class, 'show']);
Route::post('set-tikets', [TiketController::class, 'store']);
Route::put('update-tikets/{id}', [TiketController::class, 'update']);
Route::delete('delete-tikets/{tiket}', [TiketController::class, 'destroy']);
Route::get('provincias-tikets', [ProvinciaController::class, 'provinciasConTikets']);
