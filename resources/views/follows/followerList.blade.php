@extends('layouts.login')
@section('content')
<!-- フォロワーリスト -->
<div class="container">
    <!-- フォロワーアイコンの一覧表示 -->
    <div class="icon-list">
        @foreach($posts->unique('user_id') as $post)<!-- 重複するユーザーの排除'unique' -->
        <a class="other-icon" href="{{ route('other.profile' , ['id' => $post->user->id]) }}">
            <img src="{{ asset('storage/' . $post->user->images) }}" alt="{{ $post->user->username }}'s Icon" width="25" height="25">
        </a>
        @endforeach
        <!-- フォロワーの一覧表示 -->
            @foreach($posts as $post)
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="other-profile" href="{{ route('other.profile' , ['id' => $post->user->id]) }}"><!-- 相手のプロフィールページへの遷移 -->
                    <img src="{{ asset('storage/' . $post->user->images) }}" width="25" height="25">
                    </a>
                    <strong>{{ $post->user->username }}</strong>:
                    {{ $post->post }}
                    <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection