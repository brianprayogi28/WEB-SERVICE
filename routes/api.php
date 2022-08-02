<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
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

Route::get('password', function(){
  return bcrypt('ogik');
});

  //GURU
  Route::get('/guru', [GuruController::class, 'index']);
  Route::get('/guru/{gurus}', [GuruController::class, 'show']);
  //menyimpan dan menambah
  Route::post('/guru', [GuruController::class, 'store']);
  //hapus
  Route::delete('/guru/{gurus}', [GuruController::class, 'destroy']);
  //update
  Route::patch('/guru/{gurus}', [GuruController::class, 'update']);

      //MAPEL 
Route::get('/mapel', [MapelController::class, 'index']);
Route::get('/mapel/{mapels}', [MapelController::class, 'show']);
//menyimpan dan menambah
Route::post('/mapel', [MapelController::class, 'store']);
//hapus
Route::delete('/mapel/{mapels}', [MapelController::class, 'destroy']);
//update
Route::patch('/mapel/{mapels}', [MapelController::class, 'update']);

    //SISWA 
Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/{siswas}', [SiswaController::class, 'show']);
//menyimpan dan menambah
Route::post('/siswa', [SiswaController::class, 'store']);
//hapus
Route::delete('/siswa/{siswas}', [SiswaController::class, 'destroy']);
//update
Route::patch('/siswa/{siswas}', [SiswaController::class, 'update']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router){
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
  });