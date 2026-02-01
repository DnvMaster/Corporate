<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PortfoliosController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class, 'index'])->name('home');

Route::controller(PortfoliosController::class)->group(function() 
{
    Route::get('portfolios/show/{id}', 'show')->name('portfolios.show');
});

Route::controller(ArticlesController::class)->group(function() 
{
    Route::get('articles/show/{id}', 'show')->name('articles.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
