<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("startGame", [UserController::class,'startGame']);
Route::post("savewrongletters", [UserController::class,'saveWrongLetters']);
Route::post("savecorrectletters", [UserController::class,'saveCorrectLetters']);
Route::post("savelastword", [UserController::class,'saveLastWord']);