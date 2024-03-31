<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
//フォロー数の取得のためのリレーション設定
public function follows()
{
    return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
}
}
