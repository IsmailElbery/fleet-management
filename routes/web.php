<?php

use App\Http\Controllers\Web\SeatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', [SeatController::class, 'index'])->name('seats.index');
Route::get('/seats', [SeatController::class, 'index'])->name('seats.index');
Route::post('/seats/search', [SeatController::class, 'search'])->name('seats.search');
Route::post('/seats/book', [SeatController::class, 'book'])->name('seats.book');

