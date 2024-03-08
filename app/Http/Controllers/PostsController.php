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

// // 投稿の編集
// public function update(Request $request)
// {
//     $request->validate([
//         'post' => 'required|max:150',
//     ]);

//     $edit = $request->input('edit');
//     $id = $request->input('id');
//     $user_id = Auth::id();
//     dd("123");

//     User::where('id',$id)->update([
//         'edit' => $edit,
//     ]);

//     return redirect('/top');
// }

// 投稿の削除
public function delete($id)
{
    Post::where('id',$id)->delete();
    return redirect('/top');
}

}

