<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Menampilkan landing page utama, mengambil data testimoni
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');

// Menerima data dari form 'Hubungi Kami'
Route::post('/kontak', [LandingPageController::class, 'storeContact'])->name('landing.kontak');

// Simple admin access link 
Route::get('/admin', function() {
    return redirect()->route('admin.login.form');
});

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// Protected Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('admin.testimonials.store');
    Route::delete('/testimonials/{id}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    
    // Profile routes for updating credentials
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile/update-credentials', [AdminController::class, 'updateCredentials'])->name('admin.update.credentials');

    // Leads routes
    Route::get('/leads', [AdminController::class, 'leads'])->name('admin.leads');
    Route::put('/leads/{id}/status', [AdminController::class, 'updateLeadStatus'])->name('admin.leads.status');

    // Logout route
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});