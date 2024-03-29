@extends('layouts.login')

@section('content')
<div class="container">
    <h1>フォローしているユーザーの投稿</h1>
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
                    <strong>{{ $post->user->username }}</strong>: {{ $post->post }}
                    <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>

                </li>
            @endforeach
        </ul>
</div>
@endsection