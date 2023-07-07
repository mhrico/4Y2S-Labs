<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book-list', [BookController::class, 'index'])->name('book.index');
Route::get('/book-list/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book-list/create', [BookController::class, 'store'])->name('book.store');
Route::get('/book-list/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book-list/{book}/edit', [BookController::class, 'update'])->name('book.update');
Route::delete('/book-list/{book}/delete', [BookController::class, 'delete'])->name('book.delete');
Route::get('/book-list/search', [BookController::class, 'search'])->name('book.seach');