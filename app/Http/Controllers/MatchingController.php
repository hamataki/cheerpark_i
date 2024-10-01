<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ここから追加
use App\Models\Reaction; // Reactionモデルを使う場合、App\Models\Reactionが必要
use App\Models\User;     // Userモデルも同様
use Auth;
use App\Models\Constants\Status; // 定数クラス
// ここまで追加

class MatchingController extends Controller
{
    // ここから追加
    public function matching(){

        $got_reaction_ids = Reaction::where([
            ['to_user_id', Auth::id()], //to_user_idが自分になる
            ['status', Status::LIKE]
            ])->pluck('from_user_id');

        $matching_ids = Reaction::whereIn('to_user_id', $got_reaction_ids)
        ->where('status', Status::LIKE)
        ->where('from_user_id', Auth::id())
        ->pluck('to_user_id');

        $matching_users = User::whereIn('id', $matching_ids)->get();
        
        $match_users_count = count($matching_users);

        return view('users.matching', compact('matching_users', 'match_users_count'));
    }
    // ここまで追加
}
