<?php

use App\Http\Controllers\MercadoLivreNotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/categories', [ProductController::class, 'getCategories']);
Route::post('/products', [ProductController::class, 'store']);
Route::post('/mercadolivre/notificacoes', [MercadoLivreNotificationController::class, 'handle'])
    ->name('mercado-livre.notifications');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
