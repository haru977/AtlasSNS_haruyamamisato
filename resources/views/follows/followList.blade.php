@extends('layouts.login')

@section('content')
<!-- フォローリスト -->
<div class="follow-container">
    <!-- フォローユーザーアイコンの一覧表示 -->
    <div class="follow-list">
        <ul class="icon-list">
            <li><p class="title">フォローリスト</p></li>
            <li class="follow-icon">
                <!-- 重複するユーザーの排除(unique) -->
                @foreach($posts->unique('user_id') as $post)
                <a class="other-icon" href="{{ route('other.profile' , ['id' => $post->user->id]) }}">
                <img src="{{ asset('storage/' . $post->user->images) }}" alt="{{ $post->user->username }}'s Icon" width="25" height="25">
                </a>
                @endforeach
            </li>
        </ul>
        <!-- フォローユーザーの一覧表示 -->
        @foreach($posts as $post)
        <ul class="posts">
            <li class="posts-item">
                <div class="posts-box">
                    <!-- 相手のプロフィールページへの遷移 -->
                    <a class="other-profile-icon" href="{{ route('other.profile' , ['id' => $post->user->id]) }}">
                        <img src="{{ asset('storage/'. $post->user->images) }}" width="25" height="25">
                    </a>
                    <span class="post-name">{{ $post->user->username }}</span>
                    <span class="post-time">{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
                <p class="posts">{{ $post->post }}</p>
            </li>
        </ul>
        @endforeach
    </div>
</div>
@endsection