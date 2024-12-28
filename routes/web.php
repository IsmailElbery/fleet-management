<?php

use App\Http\Controllers\ProfileController;
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

//add / route to redirect to login page
Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/seats', [SeatController::class, 'index'])->name('seats.index');
    Route::post('/seats/search', [SeatController::class, 'search'])->name('seats.search');
    Route::post('/seats/book', [SeatController::class, 'book'])->name('seats.book');
});

require __DIR__.'/auth.php';
