<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PortfoliosController;
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