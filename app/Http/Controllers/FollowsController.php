<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class FollowsController extends Controller
{

    // フォロー機能
    // フォローアクション
    public function follows(User $user)
    {
        Auth::user()->following()->attach($user->id);
        return redirect()->back();
    }

    // フォロー解除アクション
    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user->id);
        return redirect()->back();
    }

    // フォローリスト
    public function index()
{
    // 投稿の一覧表示
    $posts = Post::all();//投稿データを取得
    return view('follow-list', compact('posts'));//投稿データをビューに渡す
}
}