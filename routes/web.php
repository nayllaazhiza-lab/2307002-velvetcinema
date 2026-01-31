<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController; 
use App\Http\Controllers\Admin\MovieManagementController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// 2. Jalur khusus USER
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [MovieController::class, 'index'])->name('dashboard');
    Route::get('/trending', [MovieController::class, 'trending'])->name('trending');
    Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
    Route::get('/watchlist', [MovieController::class, 'watchlist'])->name('watchlist');
    Route::post('/watchlist/add', [MovieController::class, 'addToWatchlist'])->name('watchlist.add');
    Route::delete('/watchlist/{id}', [MovieController::class, 'removeFromWatchlist'])->name('watchlist.remove');
});

// 3. Jalur khusus ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Utama Admin
    Route::get('/dashboard', [MovieController::class, 'index'])->name('dashboard');

    // FITUR MANAGE MOVIES (CRUD) - Menggunakan penamaan yang lebih bersih
    Route::prefix('movies')->name('movies.')->group(function() {
        Route::get('/', [MovieManagementController::class, 'index'])->name('index');
        Route::get('/create', [MovieManagementController::class, 'create'])->name('create');
        Route::post('/', [MovieManagementController::class, 'store'])->name('store');
        Route::get('/{movie}/edit', [MovieManagementController::class, 'edit'])->name('edit');
        Route::put('/{movie}', [MovieManagementController::class, 'update'])->name('update');
        Route::delete('/{movie}', [MovieManagementController::class, 'destroy'])->name('destroy');
    });
});

// 4. Jalur Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';