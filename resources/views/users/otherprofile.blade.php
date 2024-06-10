@extends('layouts.login')
@section('content')
<div class="container">
    <tr>
        <td><img src="{{ asset('storage/' . $user->images) }}" alt="{{ $user }}" width="25" height="25">
        ユーザー名{{ $user->username }}</td>
        <td>自己紹介{{ $user->bio }}</td>
        <td>@if(Auth::user()->following->contains($user)) <!-- フォローしているかどうかでボタンの切り替え -->
            <form action="{{ route('users.unfollow', $user) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">フォロー解除
                </button>
            </form>
        @else
            <form action="{{ route('users.follow', $user) }}" method="post">
                @csrf
                <input type="hidden" name="follows">
                <button type="submit" class="btn btn-info">フォローする
                </button>
            </form>
        @endif
        </td>
    </tr>
    <!-- 他ユーザープロファイル -->
    @if(count($posts) > 0)
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <a class="other-profile" href="{{ route('other.profile' , ['id' => $post->user->id]) }}"><!-- 相手のプロフィールページへの遷移 -->
                    <img src="{{ asset('storage/' . $post->user->images) }}" width="25" height="25">
                    </a>
                    <strong>{{ $post->user->username }}</strong>: {{ $post->post }}
                    <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>

                </li>
            @endforeach
        </ul>
    @else
    @endif
</div>
@endsection