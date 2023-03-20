<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsOfUseController;
use App\Http\Controllers\TokushohoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

Route::get('/terms-of-use', [TermsOfUseController::class, 'index'])->name('terms-of-use');

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
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');
        Route::get('/history', [AccountController::class, 'showBidHistory'])->name('showBidHistory');
        Route::get('/withdrawal', [AccountController::class, 'showWithdrawalForm'])->name('showWithdrawalForm');
        Route::post('/withdrawal', [AccountController::class, 'withdrawal'])->name('withdrawal');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    require __DIR__ . '/admin.php';
});

require __DIR__ . '/auth.php';
