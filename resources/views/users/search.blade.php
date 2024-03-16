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
        <td>{{ $user->username }}</td>
    <img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
    </tr>
    @endif
    @endforeach
    </div>
</div>


@endsection