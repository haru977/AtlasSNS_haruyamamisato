<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    // ユーザー検索機能
    public function search(Request $request){
        $loggedInUserId = Auth::id();// ログインユーザーの取得
        $keyword = $request->input('keyword');// 検索したワードを$keywordで取得

        // usersテーブルからusernameをあいまい検索
        // ワードがない場合は全ユーザーを表示
        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')
            ->where('id','!=', $loggedInUserId)// ログインユーザーのIDを除外
            ->get();
        }else{
            $users = User::all();
        }
        return view('users.search',['users'=>$users, 'keyword' => $keyword]);
    }

    // プロフィール編集フォームの表示
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // 現在ログインしているユーザーが他のユーザーのプロファイルを編集できないようにチェック
        if (Auth::id() != $user->id) {
            return redirect('/top')->with('error', 'You are not authorized to edit this profile.');
        }

        return view('profile.edit', compact('user'));
    }

    // プロフィール更新処理
    public function update(Request $request)
    {
        // バリデーション設定
        $request->validate([
            'username' => 'required|between:2,12',
            'mail' => 'required|email|between:5,40|unique:users,mail,' . Auth::id(),
            'password' => 'nullable|alpha_num|between:8,20|confirmed',
            'bio' => 'max:150',
            'images' => 'nullable|mimes:jpg,png,bmp,gif,svg|max:2048',
        ]);

        // 更新データの準備
        // $data = $request->only('username', 'mail', 'bio');
        $data = [
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'bio' => $request->input('bio'),];

        // パスワードが入力されている場合のみハッシュ化して更新
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // 画像がアップロードされた場合の処理
        if ($request->hasFile('images')) {
        $filename = $request->images->getClientOriginalName();
        $imagePath = $request->images->storeAs('profile_images' , $filename ,'public');
        $data['images'] = $imagePath;
        }

        // ユーザー情報の更新
        $user = Auth::user();
        $user->update($data);

        return redirect('/top');
    }

    //投稿者情報受け取りのためリレーション設定
    //1対多の「多」と結合（一人の投稿者が複数の投稿をすることができる）
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

        // ユーザーアイコンにリンクを設定
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        return view('users.otherprofile', compact('user'));
    }

        // 押されたアイコンのユーザーのプロフィールを表示
    public function otherProfile($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->latest()->get();
        return view('users.otherprofile', compact('user' , 'posts'));
    }
}