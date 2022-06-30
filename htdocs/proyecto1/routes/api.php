<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientecontroller;
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
Route::get('/cliente',[clientecontroller::class,'index']);//creo ruta cualquiera//busca por Id //llamao controladro  //llamo el metodo
Route::get('/cliente_show/{id}',[clientecontroller::class,'show']);
Route::post('/cliente_store',[clientecontroller::class,'store']);
Route::put('/cliente/{id}',[clientecontroller::class,'update']);
Route::delete('/cliente/{id}',[clientecontroller::class,'destroy']);


?>