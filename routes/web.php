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

Route::get('/query', [QueryController::class, 'index']);
Route::get('/query/{id}', [QueryController::class, 'show']);


Route::get('/lawyer/{id}', [LawyerController::class, 'show']);
