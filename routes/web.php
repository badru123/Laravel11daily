<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/*
Route::view('/', 'home')->name('home');
Route::get('/', [\App\Controllers\HomeController::class, 'index'])->name('home');
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () { 
        return view('dashboard');
    })->name('dashboard');
 
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    //menambahkan middleware isadmin
    // Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('is_admin');
    // dapat juga di pass
    // Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware(\App\Http\Middleware\IsAdminMiddleware::class);
    // route di grup ke is admib middleware
    Route::middleware('is_admin')->group(function () { 
    //    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('is_admin'); 
        Route::resource('categories', \App\Http\Controllers\CategoryController::class); 
        Route::resource('posts', \App\Http\Controllers\PostController::class);
    });
});
// Route::resource('categories', \App\Http\Controllers\CategoryController::class);
require __DIR__.'/auth.php';
Route::view('/', 'home')->name('home');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
