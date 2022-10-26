<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::prefix('articles')->controller(ArticleController::class)->name('article.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{article}', 'show')->name('show');
});

Route::prefix('tags')->controller(TagController::class)->name('tag.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{tag}', 'show')->name('show');
});

Route::prefix('authors')->controller(AuthorController::class)->name('author.')->group(function () {
    Route::get('/{user}', 'show')->name('show');
});

require __DIR__.'/auth.php';
