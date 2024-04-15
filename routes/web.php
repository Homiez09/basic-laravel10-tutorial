<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

// Reader
Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/detail/{id}', [BlogController::class, 'detail'])->name('detail');

// Writer
Route::prefix('author')->group(function () {
    Route::get('/blog', [AdminController::class, 'index'])->name('blog');
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
});

// Route::fallback(function () {
//     return ("<h1>404 Not Found</h1>");
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
