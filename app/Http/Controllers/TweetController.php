<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    // 🔽 liked のデータも合わせて取得するよう修正
    $tweets = Tweet::with(['user', 'liked'])->latest()->get();
    // dd($tweets);
    return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //⭐️追加
    return view('tweets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーションルールを定義
    $request->validate([
        'tweet' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーションを追加
    ]);

    // 画像を保存し、パスを取得
    $imagePath = null;
    if ($request->hasFile('image')) {
        // 画像を 'public/images' ディレクトリに保存し、パスを取得
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // ツイートを作成し、データベースに保存
    $request->user()->tweets()->create([
        'tweet' => $request->input('tweet'),
        'image_path' => $imagePath, // 画像パスを追加
    ]);

    return redirect()->route('tweets.index')->with('success', 'Tweet successfully posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
  {
    return view('tweets.edit', compact('tweet'));
  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
  {
    $request->validate([
      'tweet' => 'required|max:255',
    ]);

    $tweet->update($request->only('tweet'));

    return redirect()->route('tweets.show', $tweet);
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
  {
    $tweet->delete();

    return redirect()->route('tweets.index');
  }
  
  public function mypage()
    {
        //⭐️追加
    $tweets = Tweet::with('user')->where('user_id', auth()->id())->latest()->get();
    $user = Auth::user(); // 認証済みユーザーの取得
    // ビューに$tweetsと$userの両方を渡す
    return view('mypages.show', compact('tweets', 'user'));
    }
}
