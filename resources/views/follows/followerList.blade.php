
@extends('layouts.login')
@section('content')
<!-- フォロワーリスト -->
<div class="follower-container">
    <!-- フォロワーアイコンの一覧表示 -->
    <div class="follower-list">
        <ul class="icon-list">
            <li><p class="title">フォロワーリスト</p></li>
            <li class="follower-icon">
                <!-- 重複するユーザーの排除(unique) -->
                @foreach($follower_users->unique('id') as $user)
                <a class="other-icon" href="{{ route('other.profile' , ['id' => $user->id]) }}">
                @if($user->images === 'icon1.png')
                            <!-- 画像が icon1.png の場合 -->
                            <img src="{{ asset('images/icon1.png') }}" alt="{{ $user->username }}'s Icon" width="25" height="25">
                        @else
                            <!-- 更新された画像を表示 -->
                            <img src="{{ asset('storage/' . $user->images) }}" alt="{{ $user->username }}'s Icon" width="25" height="25">
                        @endif
                </a>
                </a>
                @endforeach
            </li>
        </ul>
        <!-- フォロワーの一覧表示 -->
        @foreach($posts as $post)
        <ul class="posts">
            <li class="posts-item">
                <div class="posts-box">
                    <!-- 相手のプロフィールページへの遷移 -->
                    <a class="other-profile-icon" href="{{ route('other.profile' , ['id' => $post->user->id]) }}">
                    @if(empty($post->user->images) || $post->user->images === 'icon1.png')
                    <!-- 画像が icon1.png の場合 -->
                    <img src="{{ asset('images/icon1.png') }}" alt="Default Icon" width="25" height="25">
                @else
                    <!-- 更新された画像を表示 -->
                    <img src="{{ asset('storage/' . $post->user->images) }}" alt="User Icon" width="25" height="25">
                @endif
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
