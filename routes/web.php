<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLanguageController;
use App\Http\Controllers\SaleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return Inertia::render('Dashboard', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::name('posts.')->prefix('posts')->middleware('auth')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('update');
    Route::get('/{post}/available-laguages', [PostLanguageController::class, 'index'])->name('language.index');
    Route::post('/{post}/laguages', [PostLanguageController::class, 'store'])->name('language.store');
});

Route::prefix('sales')->name('sales.')->middleware('auth')->group(function () {
    Route::get('/', [SaleController::class, 'index'])->name('index');
    Route::post('/', [SaleController::class, 'store'])->name('store');
});
Route::get('/modal', function () {
    return Inertia::render('TestModal');
});

require __DIR__.'/auth.php';
