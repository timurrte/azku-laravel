<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminPanelMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('posts')->name('posts.')->namespace('App\Http\Controllers\Posts')->group(function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('/{post}', 'ShowController')->name('show');
});

Route::middleware([AdminPanelMiddleware::class])->name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('/', 'IndexController')->name('index');
});
require __DIR__.'/auth.php';
