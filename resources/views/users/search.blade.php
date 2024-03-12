@extends('layouts.login')

@section('content')
<!-- 検索機能 -->
<div class="container">
    <form action="/search">
        @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー検索">
        <button type="submit" class="btn btn-success">検索</button>
    </form>
    <div class=search-user>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
    <img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
    </tr>
    @endforeach
    </div>
</div>


@endsection