<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;

Route::get('/login', [AuthController::class, 'login']);
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('/', [MainController::class, 'index']);
    Route::get('/newnote', [MainController::class, 'newNote']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
