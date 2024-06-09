<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\VouchersController;
use Illuminate\Support\Facades\Route;

Route::post('/user/register', [UsersController::class, 'registerUser']);
Route::post('/user/authenticate', [UsersController::class, 'authenticateUser']);

Route::group(['middleware' => 'auth:sanctum'],function() {
    Route::get('/voucher/generate', [VouchersController::class, 'generateVoucher']);
    Route::get('/user/logout', [UsersController::class, 'logoutUser']);
});
