<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'add'])->name('add');
Route::post('/update', [HomeController::class, 'update'])->name('update');
Route::post('/delete', [HomeController::class, 'delete'])->name('delete');