<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
/*
|--------------------------------------------------------------------------
| Job Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [JobController::class, 'index'])->name('jobs.index'); // Show all jobs

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth'); // Show job creation form
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth'); // Handle new job submission

/*
|--------------------------------------------------------------------------
| Search & Tag Routes
|--------------------------------------------------------------------------
*/
Route::get('/search', SearchController::class); // Handle job search queries
Route::get('/tags/{tag:name}', TagController::class); // Filter jobs by tag name

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'create']); // Show registration form
  Route::post('/register', [RegisteredUserController::class, 'store']);  // Handle registration
  Route::get('/login', [SessionController::class, 'create']);            // Show login form
  Route::post('/login', [SessionController::class, 'store']);            // Handle login
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth'); // Handle logout
