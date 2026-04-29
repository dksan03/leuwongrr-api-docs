<?php

/**
 * Tambahkan route ini ke group route User API v1 yang SUDAH ADA.
 *
 * Penting:
 * - Jangan buat route berbasis /users/{id}/balance untuk publik.
 * - Gunakan middleware token user yang sama dengan endpoint /api/v1/me.
 * - Endpoint ini harus membaca saldo dari pemilik token.
 */

use App\Http\Controllers\Api\V1\MeController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware(['auth:sanctum', 'throttle:api'])
    ->group(function () {
        Route::get('/me/balance', [MeController::class, 'balance']);
    });
