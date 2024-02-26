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
            'content' => 'required|max:155']);

        $post = new Post();
        $post->post = $request->input('content');//postカラムにデータを保存
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/top');
    }
}
