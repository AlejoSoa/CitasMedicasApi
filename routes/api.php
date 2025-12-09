<?php

use App\Http\Controllers\Api\CitasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('citas', CitasController::class);

Route::get('/test', function() {
    return ['status' => 'API OK'];
});

