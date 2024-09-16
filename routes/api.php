<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('registration', [AuthController::class, 'registration']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('active-session', [SessionController::class, 'getActiveSessions']);
    Route::delete('revoke-session/{tokenId}', [SessionController::class, 'revokeSession']);
    Route::post('orders/assign-worker', [OrderController::class, 'assignWorker']);
    Route::resource('orders', OrderController::class);
    Route::get('workers', [WorkerController::class, 'getWorkersByOrderTypes']);
});

