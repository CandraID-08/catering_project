<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\AdminAuthController;

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


// Route::get('/preorder', [App\Http\Controllers\PreOrderController::class, 'create'])->name('preorder');
// Route::post('/preorder/store', [App\Http\Controllers\PreOrderController::class, 'store'])->name('preorder.store');