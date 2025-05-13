<?php

use App\Http\Controllers\HealthController;
use App\Http\Middleware\AuthCanMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'as' => 'v1.',
], function () {
    Route::get('/health', HealthController::class)->name('health')
        ->middleware(AuthCanMiddleware::class . ':appointment_viwer');
});
