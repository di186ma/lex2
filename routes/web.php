<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\LawyerController;

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

Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
Route::get('/queries/create', [QueryController::class, 'create'])->name('queries.create');
Route::post('/queries', [QueryController::class, 'store'])->name('queries.store');
Route::get('/queries/{query}/edit', [QueryController::class, 'edit'])->name('queries.edit');
Route::put('/queries/{query}', [QueryController::class, 'update'])->name('queries.update');
Route::delete('/queries/{query}', [QueryController::class, 'destroy'])->name('queries.destroy');


Route::get('/lawyer/{id}', [LawyerController::class, 'show']);
