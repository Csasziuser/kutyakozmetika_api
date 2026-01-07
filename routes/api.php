<?php

use App\Http\Controllers\FoglalasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/foglalasok/{datum}',[FoglalasController::class,"index"]);

Route::post('/foglalas',[FoglalasController::class,"store"]);

Route::delete('/foglalas/{foglalas}',[FoglalasController::class,"destroy"]);

