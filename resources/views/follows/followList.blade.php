@extends('layouts.login')

@section('content')
<!-- フォローリスト -->
<div class="container">
    <!-- フォローユーザーアイコンの一覧表示 -->
    <div class="icon-list">
        @foreach($posts->unique('user_id') as $post)<!-- 重複するユーザーの排除(unique) -->
        <a class="other-icon" href="{{ route('other.profile' , ['id' => $post->user->id]) }}">
            <img src="{{ asset('storage/' . $post->user->images) }}" alt="{{ $post->user->username }}'s Icon" width="25" height="25">
        </a>
        @endforeach
        <!-- フォローユーザーの一覧表示 -->
        @foreach($posts as $post)
        <ul class="list-group">
                <li class="list-group-item">
                    <a class="other-profile" href="{{ route('other.profile' , ['id' => $post->user->id]) }}"><!-- 相手のプロフィールページへの遷移 -->
                    <img src="{{ asset('storage/'. $post->user->images) }}" width="25" height="25">
                    </a>
                    <strong>{{ $post->user->username }}</strong>:
                    {{ $post->post }}
                    <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
                </li>
        </ul>
        @endforeach
    </div>
</div>
@endsection