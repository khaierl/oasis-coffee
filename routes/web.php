<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;  
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/team', [TeamController::class, 'index'])->name('team');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'sendMessage'])
    ->name('contact.send');

Route::post('/contact/send', [ContactMessageController::class, 'store'])
    ->name('contact.send');

Route::get('/media/{path}', [MediaController::class, 'show'])
    ->where('path', '.*')
    ->name('media.show');
