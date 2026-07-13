<?php


use App\Http\Controllers\WebApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//Web Mobile API
Route::get('/mapimainpage', [WebApiController::class, 'getdashboard']);
Route::get('/mapifooterbanner', [WebApiController::class, 'getfooterbanner']);
Route::get('/mapiprofil', [WebApiController::class, 'getprofil']);
Route::get('/mapilelang', [WebApiController::class, 'getlelang']);
Route::get('/mapilaporan', [WebApiController::class, 'getlaporan']);
Route::get('/mapisimulasi', [WebApiController::class, 'getsimulasi']);
Route::get('/mapikarir', [WebApiController::class, 'getkarir']);
Route::get('/mapikantor', [WebApiController::class, 'getkantor']);
Route::get('/mapiberita', [WebApiController::class, 'getberita']);

Route::get('/mapiumkm', [WebApiController::class, 'getumkm']);
Route::get('/mapidashboard', [WebApiController::class, 'getdashboardv2']);
Route::get('/mapiproduk/{jenis}', [WebApiController::class, 'getjenisproduk']);
Route::post('/formpengajuankredit', [WebApiController::class, 'formpengajuankredit']);
