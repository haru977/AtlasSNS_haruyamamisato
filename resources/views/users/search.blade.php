@extends('layouts.login')
@section('content')
<!-- 検索機能 -->
<div class="container">
    <form action="/search">
        @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー検索">
        <button type="submit" class="btn btn-success">検索</button>
    </form>
    <div class="search-word"><!-- 検索ワードの表示 -->
        @if(isset($keyword))
        <p>検索ワード: {{ $keyword }}</p>
        @endif
    </div>
    <div class="search-user"><!-- 検索後の表示 -->
    @foreach ($users as $user)
    @if($user->id != Auth::id()) <!-- ログインユーザーのIDを除外 -->
    <tr>
        <td>
        <img src="{{ asset('storage/'. $user->images) }}" width="25" height="25">
        {{ $user->username }}
        @if(Auth::user()->following->contains($user)) <!-- フォローしているかどうかでボタンの切り替え -->
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
    @endif
    @endforeach
    </div>
</div>
@endsection