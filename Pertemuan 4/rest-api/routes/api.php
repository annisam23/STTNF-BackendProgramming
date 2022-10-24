<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\IdentitasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route get menampilkan data hewan
Route::get('/animals', [AnimalController::class, 'index']);

//method post menambah data
Route::post('/animals', [AnimalController::class, 'store']);

//method put mengupdate data ke $id
Route::put('/animals/{id}', [AnimalController::class, 'update']);

//method delete menghapus data ke $id
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);
