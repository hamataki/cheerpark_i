<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // 必ずUserモデルをインポートする

use App\Models\Tweet; // ツイートモデルを使用

use Auth; // 追加
class UserController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all(); // すべてのユーザーを取得
        
        $userCount = $users->count(); // 追加
        $from_user_id = Auth::id(); // 追加

        return view('users.index', compact('users', 'userCount', 'from_user_id')); // 追加
        
    }
    
    // ユーザーの詳細ページを表示するためのメソッド
    public function show(User $user)
    {
        // $userはURLパラメータのユーザーIDに対応するユーザーモデルが自動的に取得されます
        // このユーザーのツイートを取得する
        $tweets = Tweet::where('user_id', $user->id)->get();

        // ビューにユーザーとツイートを渡す
        return view('mypages.show', compact('user', 'tweets'));
    }
}
