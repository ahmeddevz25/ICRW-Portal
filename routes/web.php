<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faculty', [HomeController::class, 'faculty'])->name('faculty');
Route::get('/workshop-details', [HomeController::class, 'workshopDetails'])->name('workshop.details');