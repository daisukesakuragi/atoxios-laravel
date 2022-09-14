<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\BidHistoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TokushohoController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::get('/terms', [TermsController::class, 'index'])->name('terms');

Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');

Route::get('/tokushoho', [TokushohoController::class, 'index'])->name('tokushoho');

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

Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/bid-history', [BidHistoryController::class, 'index'])->name('bid-history.index');
    Route::post('/bid', [BidController::class, 'bid'])->name('bid');
});

Route::prefix('admin')->name('admin.')->group(function () {
    require __DIR__ . '/admin.php';
});

require __DIR__ . '/auth.php';
