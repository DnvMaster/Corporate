<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class, 'index'])->name('home');

Route::resource('portfolio', PortfoliosController::class);

Route::controller(ArticlesController::class)->group(function()
{
    Route::get('articles','index')->name('articles');
    Route::get('articles/show/{id}','show')->name('articles.show');
    Route::get('articles/{category}', 'show')->name('articles.category');
});

Route::match(['get', 'post'], '/contacts', [ContactsController::class, 'index'])->name('contact');
