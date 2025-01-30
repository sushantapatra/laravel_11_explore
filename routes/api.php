<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

Route::post('/login', [AuthController::class,'login'])->name('login');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/admin', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum', AdminMiddleware::class);


//http://localhost:8000/api/v1/admin
Route::prefix('v1/')->middleware('auth:sanctum', AdminMiddleware::class)->group(function(){
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
});
