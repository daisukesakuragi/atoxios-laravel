<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Models\Article;
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

Route::get('/', function () {
    $articles = Article::limit(6)->get();
    return view('welcome', compact('articles'));
})->name('welcome');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/my-page', [MyPageController::class, 'index'])->middleware(['auth'])->name('my-page');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth:admin'])->name('dashboard');
    Route::get('/articles', [AdminArticleController::class, 'index'])->middleware(['auth:admin'])->name('articles.index');
    Route::get('/articles/create', [AdminArticleController::class, 'create'])->middleware(['auth:admin'])->name('articles.create');
    Route::post('/articles/create', [AdminArticleController::class, 'store'])->middleware(['auth:admin'])->name('articles.store');
    Route::get('/articles/{id}', [AdminArticleController::class, 'show'])->middleware(['auth:admin'])->name('articles.show');
    Route::get('/articles/{id}/edit', [AdminArticleController::class, 'edit'])->middleware(['auth:admin'])->name('articles.edit');
    Route::put('/articles/{id}', [AdminArticleController::class, 'update'])->middleware(['auth:admin'])->name('articles.update');
    Route::delete('/articles/{id}/destroy', [AdminArticleController::class, 'destroy'])->middleware(['auth:admin'])->name('articles.destroy');

    require __DIR__ . '/admin.php';
});

require __DIR__ . '/auth.php';
