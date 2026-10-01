<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'] )->name('home');

Route::get('/contact', [ContactController::class, 'contact'] )->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'] )->name('contact.store');

Route::get('/photo/gallery', [PhotoController::class, 'index'] )->name('photo.gallery');
Route::get('/photo/create', [PhotoController::class, 'create'] )->name('photo.create');
Route::post('/photo/store', [PhotoController::class, 'store'] )->name('photo.store');