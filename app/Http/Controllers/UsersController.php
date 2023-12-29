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
    public function search(){
        return view('users.search');
    }

    // プロフィール編集機能
    public function update(Request $request)
    {
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
            // 'images' => $icon,
        ]);

       return redirect('/top');
    }
}