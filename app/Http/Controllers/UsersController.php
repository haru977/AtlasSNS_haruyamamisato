<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
        // 検索したワードを$keywordで取得
        $keyword = $request->input('keyword');
        // usersテーブルからusernameをあいまい検索
        // ワードがない場合は全ユーザーを表示
        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::all();
        }
        return view('users.search',['users'=>$users]);
    }

    // プロフィール編集機能
    public function update(Request $request)
    {
        if($request->isMethod('post')){
            // バリデーション設定
            $request->validate([
                'username' => 'required|between:2,12',
                'mail' => 'required|unique:users|between:5,40',
                'password' => 'required|alpha_num|between:8,20',
                'password-confirmation' => 'required|alpha_num|between:8,20|same:password',
                'bio' => 'max:150',
                'photo' => 'mimes:jpg,png,bmp,gif,svg',
            ]);

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $icon = $request->input('images');

        User::where('id',$id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            'bio' => $bio,
            'images' => $icon,
        ]);
    }
       return redirect('/top');
    }

    //投稿者情報受け取りのためリレーション設定
    //1対多の「多」と結合（一人の投稿者が複数の投稿をすることができる）
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}