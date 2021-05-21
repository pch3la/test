<?php

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


Route::prefix('projects')->group(function (){
    Route::post('/',[\App\Http\Controllers\ProjectController::class,'store']);
    Route::get('/{project}',[\App\Http\Controllers\ProjectController::class,'show']);
    Route::get('/',[\App\Http\Controllers\ProjectController::class,'index']);
    Route::put('/{project}',[\App\Http\Controllers\ProjectController::class,'update']);
    Route::delete('/{project}',[\App\Http\Controllers\ProjectController::class,'destroy']);
});




