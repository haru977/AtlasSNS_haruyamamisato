<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{

public function index()
{
    // 投稿の一覧表示

    // ログインユーザーのIDを取得
    $user_id = Auth::id();

    // フォローしているユーザーのidを取得
    $following_id = Auth::user()->following()->pluck('followed_id');

    $posts = Post::whereIn('user_id', $following_id)
    ->orWhere('user_id',$user_id)
    ->orderBy('created_at', 'desc')->get();//投稿データを取得

    return view('posts.index', compact('posts'));//投稿データをビューに渡す
}

// 投稿機能
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required|min:1|max:150'],
            [
                'content.max' => '150文字以内で入力してください。',
            ]);

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

// フォローリスト
public function showfollow(){
    // フォローしているユーザーのidを取得
    $following_id = Auth::user()->following()->pluck('followed_id');
    // フォローしているユーザーのidを元に投稿内容を取得
    $posts = Post::orderBy('created_at','desc')->whereIn('user_id', $following_id)->get();
    // フォロワーのユーザー情報を取得
    $following_users = User::whereIn('id', $following_id)->get();
    // dd("$following_id");
    return view('follows.followlist', compact('posts','following_users'));
    }

    // フォロワーリスト
public function showfollower(){
    // フォローされたユーザーのidを取得
    $follower_id = Auth::user()->follower()->pluck('following_id');
    // フォローされたユーザーのidを元に投稿内容を取得
    $posts = Post::orderBy('created_at','desc')->whereIn('user_id', $follower_id)->get();
    // フォロワーのユーザー情報を取得
    $follower_users = User::whereIn('id', $follower_id)->get();
    // dd("$follower_id");
    return view('follows.followerlist', compact('posts', 'follower_users'));
    }
}