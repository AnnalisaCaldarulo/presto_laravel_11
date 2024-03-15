<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('homepage');

//articles
Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
