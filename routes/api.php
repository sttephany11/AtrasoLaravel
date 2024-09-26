<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ControllerAluno;

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



Route::get('/periodo','App\Http\Controllers\PeriodoController@index');
Route::get('/modulo','App\Http\Controllers\ModuloController@index');
Route::get('/curso','App\Http\Controllers\CursoController@index');
Route::get('/atraso','App\Http\Controllers\AtrasoController@index');
Route::get('/alunos' ,'App\Http\Controllers\AlunosController@index') ;

Route::post('/qrcode',[QrCodeController::class, 'store']);

Route::post('/alunos' ,[ControllerAluno::class, 'storeApi']) ;
Route::post('/auth' ,[AlunosController::class, 'auth']) ;