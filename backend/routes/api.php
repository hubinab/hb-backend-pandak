<?php

use App\Http\Controllers\PandaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource("/pandas",PandaController::class)
    ->only(["index","show","destroy"]);