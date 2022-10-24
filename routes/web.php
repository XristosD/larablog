<?php

use App\Http\Controllers\ArticleController;
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
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::prefix('tags')->controller(TagController::class)->name('tag.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{tag}', 'show')->name('show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
