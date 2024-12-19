<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::as('pages:')->group(static function (): void {
    Route::middleware(['auth'])->group(static function (): void {
        Route::view('/', 'pages.index')->name('home');

        Route::prefix('testimonials')->as('testimonials:')->group(base_path(
            path: 'routes/web/testimonials.php',
        ));
    });

    Route::view('testimonials/complete', 'pages.testimonials.complete')->name('testimonials:complete');
});

Route::middleware('guest')->prefix('oauth')->as('oauth:')->group(base_path(
    path: 'routes/web/oauth.php',
));
