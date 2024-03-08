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

// 投稿の編集
public function update(Request $request)
{
    $request->validate([
        'edit' => 'required|max:150',
    ]);

    $id = $request->input('id');// 編集する投稿(ID)の取得
    $post = Post::findOrFail($id);// 取得した投稿(ID)の投稿内容を検索
    $post->post = $request->input('edit');// 編集内容を反映
    $post->save();// 変更をデータベースに保存

    return redirect('/top');
}

// 投稿の削除
public function delete($id)
{
    Post::where('id',$id)->delete();
    return redirect('/top');
}

}

