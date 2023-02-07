<?php

use App\Http\Controllers\V1\BannerController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::post('auth/sign-up', [UserController::class, 'signUp']);

Route::get('banner/{bannerType}', [BannerController::class, 'getRecordByType']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});