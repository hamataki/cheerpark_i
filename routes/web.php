<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// ⭐️1行追加⭐️
use App\Http\Controllers\TweetController;
// 🔽 追加 🔽
use App\Http\Controllers\TweetLikeController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ReactionController;

use App\Http\Controllers\MypageController;

use App\Http\Controllers\MatchingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    // ⭐️ 追加 ⭐️
  Route::resource('tweets', TweetController::class);
  
  // 🔽 2行追加  🔽
  Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store'])->name('tweets.like');
  Route::delete('/tweets/{tweet}/like', [TweetLikeController::class, 'destroy'])->name('tweets.dislike');
  
  Route::get('/mypages', [TweetController::class, 'show'])->name('mypages.show');
  
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  
  // この行を追記
  Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
      Route::get('show/{id}', 'MypageController@show')->name('mypages.show');
  });
  

});

 // この行を追加
Route::get('/users/show/{id}', [MypageController::class, 'show'])->name('mypages.show');


Route::post('/reaction', [ReactionController::class, 'create'])->name('reaction.create');

Route::get('/matching', [MatchingController::class, 'matching'])->name('users.matching');

// ユーザーのマイページを表示するためのルート
Route::get('/users/{user}', [UserController::class, 'show'])->name('mypages.show');

require __DIR__.'/auth.php';
