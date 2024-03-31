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

}