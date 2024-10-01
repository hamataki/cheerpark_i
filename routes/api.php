<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReactionController;

use App\Http\Controllers\MypageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ここはコメントアウト
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// この行を追加
Route::post('/like', 'ReactionController@create');
// この行を追加
// ルート定義に auth ミドルウェアを適用
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/like', [ReactionController::class, 'create']);
// });
// Route::get('/mypage', [MypageController::class, 'index']);