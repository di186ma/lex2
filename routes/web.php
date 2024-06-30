<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\ProfileController;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admin/{id}', [AdminController::class, 'show']);

//Route::get('/query', [QueryController::class, 'index']);
//Route::get('/query/{id}', [QueryController::class, 'show']);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::middleware(['auth'])->group(function () {

//Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
    Route::get('/queries/create', [QueryController::class, 'create'])->name('queries.create');
    Route::post('/queries', [QueryController::class, 'store'])->name('queries.store');
    Route::get('/queries/{query}/edit', [QueryController::class, 'edit'])->name('queries.edit');
    Route::put('/queries/{query}', [QueryController::class, 'update'])->name('queries.update');
    Route::delete('/queries/{query}', [QueryController::class, 'destroy'])->name('queries.destroy');
    Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
    Route::post('/queries/per-page', [QueryController::class, 'updatePerPage'])->name('queries.updatePerPage');
});


Route::get('/lawyer/{id}', [LawyerController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
