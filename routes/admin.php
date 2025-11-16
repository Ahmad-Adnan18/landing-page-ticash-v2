<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Admin Authentication Routes
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

// Protected Admin Routes
Route::group(['middleware' => ['admin.auth']], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('admin.testimonials.store');
    Route::delete('/testimonials/{id}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    
    // Logout route
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});