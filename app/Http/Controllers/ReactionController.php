<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;  // ユーザーモデルを使用
use App\Models\Reaction;  // リアクションモデルを使用
use App\Models\Constants\Status;  // LIKE/DISLIKEのステータス定数を使用
// use Auth;  // 現在の認証ユーザーを取得
use Log;  // ログ出力用

class ReactionController extends Controller
{
    // ここから追加
    public function create(Request $request)
    {
        Log::debug($request);

        $to_user_id = $request->to_user_id;
        $like_status = $request->reaction;
        $from_user_id = $request->from_user_id;

        if ($like_status === 'like'){
            $status = Status::LIKE;
        }else{
            $status = Status::DISLIKE;
        }
        
        // 既存のリアクションをチェック
        $existingReaction = Reaction::where('to_user_id', $to_user_id)
            ->where('from_user_id', $from_user_id)
            ->first();

        if ($existingReaction) {
            // リアクションが既に存在する場合、ステータスをアップデート
            $existingReaction->status = $status;
            $existingReaction->save();
        } else {
            // リアクションが存在しない場合、新しいレコードを作成
            $newReaction = new Reaction();
            $newReaction->to_user_id = $to_user_id;
            $newReaction->from_user_id = $from_user_id;
            $newReaction->status = $status;
            $newReaction->save();
        }
        
        // 次のユーザー表示のためにリダイレクト
        return redirect()->back();
    }
    // ここまで追加
}