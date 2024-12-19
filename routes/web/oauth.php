<?php

declare(strict_types=1);

use App\Http\Controllers\OAuth\GitHub;
use Illuminate\Support\Facades\Route;

Route::view('login', 'pages.oauth.login')->name('login');

Route::prefix('github')->as('github:')->group(static function (): void {
    Route::get('redirect', GitHub\RedirectController::class)->name('redirect');
    Route::get('callback', GitHub\CallbackController::class)->name('callback');
});
