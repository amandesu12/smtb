<?php

use App\Http\Controllers\FruitController;
use App\Models\Fruit;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\FruitRequest;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FruitController::class, 'index']);
Route::post('/fruits', [FruitController::class, 'store']);
Route::get('/fruits/{id}/edit', [FruitController::class, 'edit']);
Route::put('/fruits/{id}', [FruitController::class, 'update']);
Route::delete('/fruits/{id}', [FruitController::class, 'destroy']);
Route::get('/fruits/search', [FruitController::class, 'search']);
Route::resource('fruits', FruitController::class);