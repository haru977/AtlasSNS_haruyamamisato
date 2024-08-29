@extends('layouts.login')
@section('content')
<div class="other-container">
    <!-- ユーザープロファイル -->
    <div class="other-profile">
        <div class="other-icon">
            <img src="{{ asset('storage/' . $user->images) }}" alt="{{ $user }}" width="25" height="25">
        </div>
        <div class="profile-block">
            <div class="other-data">
                <p class="name-data">ユーザー名</p>
                <div class="other-name">{{ $user->username }}</div>
            </div>
            <div class="other-data">
                <p class="bio-data">自己紹介</p>
                <div class="other-bio">{{ $user->bio }}</div>
            </div>
        </div>
        <div class="other-btn">
            @if(Auth::user()->following->contains($user)) <!-- フォローしているかどうかでボタンの切り替え -->
            <form action="{{ route('users.unfollow', $user) }}" method="post">
            @csrf
                <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
            @else
            <form action="{{ route('users.follow', $user) }}" method="post">
            @csrf
                <input type="hidden" name="follows">
                <button type="submit" class="btn btn-info">フォローする</button>
            </form>
            @endif
        </div>
    </div>
    <!-- ユーザーの投稿 -->
    @if(count($posts) > 0)
        <ul class="posts">
            @foreach($posts as $post)
            <li class="posts-item">
            <div class="posts-box">
                    <!-- 相手のプロフィールページへの遷移 -->
                    <a class="other-profile-page" href="{{ route('other.profile' , ['id' => $post->user->id]) }}">
                        <img src="{{ asset('storage/' . $post->user->images) }}" width="25" height="25">
                    </a>
                    <span class="post-name">{{ $post->user->username }}</span>
                    <span class="post-time">{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
                <p class="posts">{{ $post->post }}</p>
            </div>
            </li>
            @endforeach
        </ul>
    @else
    @endif
</div>
@endsection