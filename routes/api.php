<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/register', [UsersController::class, 'registerUser']);
Route::post('/tokens/create', [UsersController::class, 'createToken']);


 Route::group(['middleware' => 'auth:sanctum'],function() {

 });
