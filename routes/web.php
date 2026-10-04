<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/photo/gallery', [PhotoController::class, 'index'])->name('photo.gallery');
Route::get('/photo/create', [PhotoController::class, 'create'])
->middleware('is_admin')
->name('photo.create');
Route::post('/photo/store', [PhotoController::class, 'store'])->name('photo.store');
Route::get('/photo/{photo}/edit', [PhotoController::class, 'edit'])
->middleware('is_admin')
->name('photo.edit');
Route::put('/photo/{photo}', [PhotoController::class, 'update'])->name('photo.update');
Route::delete('/photo/{photo}', [PhotoController::class, 'destroy'])
    ->middleware('is_admin')
    ->name('photo.destroy');
