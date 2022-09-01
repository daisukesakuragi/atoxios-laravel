<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MyPageController;
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
    require __DIR__ . '/admin.php';
});

require __DIR__ . '/auth.php';
