@extends('layouts.login')
@section('content')
<!-- 検索機能 -->
<div class="search-container">
    <div class="search-box">
        <form action="/search">
        @csrf
            <div class="search-form">
                <input type="text" name="keyword" class="form" placeholder="ユーザー名">
                <button type="submit" class="search-btn">
                    <img class="search-btn" src="images/search.png" width="25" height="25">
                </button>
            </div>
        </form>
        <div class="search-word"><!-- 検索ワードの表示 -->
        @if(isset($keyword))
        <p>検索ワード : {{ $keyword }}</p>
        @endif
        </div>
    </div>
    <div class="search-user">
        <!-- 検索後の表示 -->
        @foreach ($users as $user)
        @if($user->id != Auth::id()) <!-- ログインユーザーのIDを除外 -->
        <div class="search-list">
            <div class="search-block">
                <div class="search-icon">
                    <img src="{{ asset('storage/'. $user->images) }}" width="25" height="25">
                </div>
                <p class="search-name">{{ $user->username }}</p>
            <!-- フォローしているかどうかでボタンの切り替え -->
                <div class="search-follow">
                @if(Auth::user()->following->contains($user))
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
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection