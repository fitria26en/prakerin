<?php
use App\Models\Provinsi;
use App\Models\Kasuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Api Provinsi
Route::get('provinsi',[ProvinsiController::class, 'index']);
Route::post('provinsi/store',[ProvinsiController::class, 'store']);
Route::get('provinsi/{id}',[ProvinsiController::class, 'show']);
// Route::post('provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('provinsi/{id}',[ProvinsiController::class, 'destroy']);


//kasuse
Route::get('kasuse',[ApiController::class, 'index']);
Route::get('provinsikasus/{id}',[ApiController::class, 'provinsi']);
Route::get('provinsikasus2',[ApiController::class, 'provinsikasus']);