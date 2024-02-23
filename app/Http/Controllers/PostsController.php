<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

public function index()
{
    // 投稿の表示
    $posts = Post::all();

    return view('posts.index', compact('posts'));
}


// 投稿機能
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required|max:155']);

        $post = new Post();
        $post->post = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/top');
    }
}
