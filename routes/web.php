<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'] )->name('home');

Route::get('/contact', [ContactController::class, 'contact'] )->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'] )->name('contact.store');

Route::get('/gallery', [GalleryController::class, 'index'] )->name('gallery');