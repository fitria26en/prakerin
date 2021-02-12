<?php

use App\Models\Provinsi;
use App\Models\Rw;
use App\Models\Kasus;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// api provinsi
Route::get('provinsi',[ProvinsiController::class, 'index']);
Route::post('provinsi',[ProvinsiController::class, 'store']);
Route::get('provinsi/{id}',[ProvinsiController::class, 'show']);
Route::delete('provinsi/{id}',[ProvinsiController::class, 'destroy']);

//api kasus
Route::get('kasus',[ApiController::class, 'index']);
Route::get('provinsi2/{id}',[ApiController::class, 'provinsi']);
Route::get('indonesia',[ApiController::class, 'indonesia']);
Route::get('kota',[ApiController::class, 'kota']);
Route::get('kecamatan',[ApiController::class, 'kecamatan']);
Route::get('kelurahan',[ApiController::class, 'kelurahan']);

Route::get('rw',[ApiController::class, 'rw']);
Route::get('hari',[ApiController::class, 'hari']);