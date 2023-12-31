<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ArticlesController;

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

Route::resource('/',IndexController::class,['only'=>['index'],'names'=>['index'=>'home']]);
Route::resource('portfolios','PortfoliosController::class',['parameters'=>['portfolios'=>'alias']]);
Route::resource('articles',ArticlesController::class,['parameters'=>['articles'=>'alias']]);
Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat']);
