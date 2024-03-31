<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //投稿者情報の受け取りのためリレーション設定
    //1対多の「1」と結合（一人の投稿者が複数の投稿をすることができる）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
