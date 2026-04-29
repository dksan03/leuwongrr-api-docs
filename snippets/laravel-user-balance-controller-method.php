<?php

/**
 * Tambahkan method ini ke controller User API kamu, misalnya:
 * app/Http/Controllers/Api/V1/MeController.php
 *
 * Sesuaikan field saldo:
 * - $user->balance
 * - $user->saldo
 * - $user->wallet_balance
 */

use Illuminate\Http\Request;

public function balance(Request $request)
{
    $user = $request->user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized API token.',
        ], 401);
    }

    // Ganti "balance" jika field saldo di database kamu bernama "saldo" atau "wallet_balance".
    $amount = (int) ($user->balance ?? 0);

    return response()->json([
        'success' => true,
        'message' => 'OK',
        'data' => [
            'balance' => [
                'amount' => $amount,
                'formatted' => 'Rp' . number_format($amount, 0, ',', '.'),
                'currency' => 'IDR',
            ],
            'updated_at' => optional($user->updated_at)->toIso8601String(),
        ],
    ]);
}
