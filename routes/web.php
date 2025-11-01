<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreOrderController;

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

// Route::get('/preorder', [App\Http\Controllers\PreOrderController::class, 'create'])->name('preorder');
// Route::post('/preorder/store', [App\Http\Controllers\PreOrderController::class, 'store'])->name('preorder.store');