<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('page.about');
})->name('about');

Route::get('/tentang', function () {
    return view('page.tentang');
})->name('tentang');

Route::get('/preorder', [PreOrderController::class, 'create'])->name('preorder');
Route::post('/preorder/store', [PreOrderController::class, 'store'])->name('preorder.store');

// Route login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Halaman home (bisa diakses semua, tapi kalau admin login dia bisa logout)
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// FITUR LUPA PASSWORD ADMIN
Route::get('/admin/forgot-password', [AdminAuthController::class, 'showForgotForm'])->name('admin.password.request');
Route::post('/admin/forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('admin.password.email');
Route::get('/admin/reset-password', [AdminAuthController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('/admin/reset-password', [AdminAuthController::class, 'resetPassword'])->name('admin.password.update');

Route::middleware(['auth:admin'])->group(function () {

    // Dashboard (Data Preorder)
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    // ✅ Data Menu
    Route::get('/admin/data-menu', function () {
        return view('admin.data-menu');
    })->name('admin.data.menu');

    // ✅ Generate Nota
    Route::get('/admin/generate-nota', function () {
        return view('admin.generate-nota');
    })->name('admin.generate.nota');

});

Route::get('/events', [PreOrderController::class, 'getEvents']);
Route::get('/admin/preorder/{id}/edit', [App\Http\Controllers\AdminDashboardController::class, 'edit'])->name('admin.preorder.edit');
Route::post('/admin/preorder/{id}/update', [App\Http\Controllers\AdminDashboardController::class, 'update'])->name('admin.preorder.update');
Route::delete('/admin/preorder/{id}/delete', [AdminDashboardController::class, 'destroy'])
    ->name('admin.preorder.destroy');

Route::get('/detail-nota', function () {
    return view('page.detail-nota');
})->name('nota.detail');





// Route::get('/preorder', [App\Http\Controllers\PreOrderController::class, 'create'])->name('preorder');
// Route::post('/preorder/store', [App\Http\Controllers\PreOrderController::class, 'store'])->name('preorder.store');