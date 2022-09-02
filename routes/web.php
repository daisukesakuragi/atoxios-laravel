<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\PlanController;
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

Route::group(['prefix' => 'articles', 'as' => 'articles.'], function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticleController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
    Route::get('/', [MemberController::class, 'index'])->name('index');
    Route::get('/{slug}', [MemberController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'plans', 'as' => 'plans.'], function () {
    Route::get('/', [PlanController::class, 'index'])->name('index');
    Route::get('/{slug}', [PlanController::class, 'show'])->name('show');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/my-page', [MyPageController::class, 'index'])->name('my-page');
});

Route::prefix('admin')->name('admin.')->group(function () {
    require __DIR__ . '/admin.php';
});

require __DIR__ . '/auth.php';
