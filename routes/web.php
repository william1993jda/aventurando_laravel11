<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

//Route::middleware([CheckIsNotLogged::Class])->group(function(){
//    Route::get('/login', [AuthController::class, 'login']);
//    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
//});

Route::get('/login', [AuthController::class, 'login'])->middleware(CheckIsNotLogged::Class);
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->middleware(CheckIsNotLogged::Class);

Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/newnote', [MainController::class, 'newNote'])->name('new');
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');

    Route::get('/editNote/{id}', [MainController::class, 'editNote'])->name('edit');
    Route::post('/editNoteSubmit', [MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');

    Route::get('/deleteNote/{id}', [MainController::class, 'deleteNote'])->name('delete');
    Route::get('/deleteNoteConfirm/{id}', [MainController::class, 'deleteNoteConfirm'])->name('deleteConfirm');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
