
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventLinkController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SiteBackgroundController;

// HALAMAN PUBLIK
Route::get('/', [EventLinkController::class, 'home'])
    ->name('public.home');

// HALAMAN ADMIN
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Harus diletakkan sebelum resource
    Route::delete(
        '/event-links/bulk-destroy',
        [EventLinkController::class, 'bulkDestroy']
    )->name('event-links.bulk-destroy');

    Route::resource('event-links', EventLinkController::class)
        ->except(['show']);
});

Route::get(
    '/admin/background',
    [SiteBackgroundController::class, 'index']
)->name('admin.backgrounds.index');

Route::put(
    '/admin/background',
    [SiteBackgroundController::class, 'update']
)->name('admin.backgrounds.update');


// HALAMAN PUBLIK
Route::get('/', [EventLinkController::class, 'home'])
    ->name('public.home');

// LOGIN ADMIN
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.process');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

// CRUD ADMIN - PENGECEKAN LOGIN DI CONTROLLER
Route::prefix('admin')->name('admin.')->group(function () {

    Route::delete(
        '/event-links/bulk-destroy',
        [EventLinkController::class, 'bulkDestroy']
    )->name('event-links.bulk-destroy');

    Route::resource('event-links', EventLinkController::class)
        ->except(['show']);
});
