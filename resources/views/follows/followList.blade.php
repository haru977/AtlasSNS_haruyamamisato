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
                @foreach($following_users->unique('id') as $user)
                <a class="other-icon" href="{{ route('other.profile' , ['id' => $user->id]) }}">
                @if($user->images === 'icon1.png')
                            <!-- 画像が icon1.png の場合 -->
                            <img src="{{ asset('images/icon1.png') }}" alt="{{ $user->username }}'s Icon" width="25" height="25">
                        @else
                            <!-- 更新された画像を表示 -->
                            <img src="{{ asset('storage/' . $user->images) }}" alt="{{ $user->username }}'s Icon" width="25" height="25">
                        @endif
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