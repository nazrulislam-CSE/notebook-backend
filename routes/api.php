<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NotebookController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('notebooks')->controller(NotebookController::class)->group(function () {
    Route::get('/', 'index');          
    Route::post('/', 'store');          
    Route::get('/{id}', 'show');        
    Route::put('/{id}', 'update');      
    Route::delete('/{id}', 'destroy');
});