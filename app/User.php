<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //  ※fillable = 書き換え可能
    protected $fillable = [
        'username','mail','password','bio','images','following_id','followed_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // フォロー機能
    // 多対多のリレーション設定(フォローアクション、フォロー数の取得)
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // 多対多のリレーション設定（フォロー解除アクション、フォロワー数の取得）
    public function follower()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    // ログインユーザーがフォローしているかの確認
    public function isFollowing(User $user)
    {
        return $this->following->contains($user);
    }

    // フォローリスト
    // フォローしてるユーザーの投稿を取得するためのリレーション設定
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
