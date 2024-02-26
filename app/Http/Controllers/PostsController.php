<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

public function index()
{
    // 投稿の一覧表示
    $posts = Post::all();//投稿データを取得
    return view('posts.index', compact('posts'));//投稿データをビューに渡す
}

// 投稿機能
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required|min:1|max:155']);

        $post = new Post();
        $post->post = $request->input('content');//postカラムにデータを保存
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/top');
    }

    //投稿者情報の受け取りのためリレーション設定
    //1対多の「1」と結合（一人の投稿者が複数の投稿をすることができる）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
