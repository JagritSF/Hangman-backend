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

Route::post("start-game", [UserController::class,'startGame']);
Route::post("save-wrong-letters", [UserController::class,'saveWrongLetters']);
Route::post("save-correct-letters", [UserController::class,'saveCorrectLetters']);
Route::post("save-last-word", [UserController::class,'saveLastWord']);