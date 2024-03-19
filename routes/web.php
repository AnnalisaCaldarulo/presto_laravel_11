<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

//articles
Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('article.index');

//category
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');


//revisor
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::post('/become-revisor', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make-revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('makeRevisor');

//cambio lingua
Route::get('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');