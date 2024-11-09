<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login']);

Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

//Route::post('/logout', [AuthController::class, 'logout']);
