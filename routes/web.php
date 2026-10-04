<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PortfolioController;
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

// pagina portfolio (lista set)
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// pagina show di un set
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// admin: crea set
Route::get('/admin/portfolio/create', [PortfolioController::class, 'create'])
->middleware('is_admin')
->name('portfolio.create');

// admin: salva set
Route::post('/admin/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');

// check access code
Route::post('/portfolio/{id}/access', [PortfolioController::class, 'checkAccess'])
->middleware('is_admin')
->name('portfolio.access.check');
