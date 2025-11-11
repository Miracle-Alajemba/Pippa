<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', [JobController::class, 'index'])->name('jobs.index');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/login', [RegisteredUserController::class, 'create']);
Route::post('/login', [RegisteredUserController::class, 'store']);
Route::delete('/logout', [RegisteredUserController::class, 'destroy']);
