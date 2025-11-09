<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

Route::get('/', [ActivityController::class, 'index'])->name('home');
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
Route::match(['get', 'post'], '/activities/search', [ActivityController::class, 'search'])->name('activities.search');

