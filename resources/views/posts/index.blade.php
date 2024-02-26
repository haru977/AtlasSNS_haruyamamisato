@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => '/posts']) !!}
<div class="post">
<img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
<!-- <input type="image" name="images" value=""><img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25"> -->

    {!! Form::text('content',null,['required','class' => 'form-control','placeholder' => '投稿内容を入力してください'])!!}
    <div class = "button">
        <button type = "submit"><img class="post-btn" src="images/post.png" width="25" height="25"></button>
    </div>
</div>
{!! Form::close() !!}

<div class="posts">
    <h2>投稿機能</h2>
    <ul>
    <!-- 投稿内容一覧表示のためのループを開始↓ -->
        @foreach ($posts as $post)
        <!-- postカラムの値（投稿内容）を表示↓ -->
        <li>><strong>{{ $post->user->name }}</strong>: {{ $post->post }}</li>
        @endforeach
    </ul>
</div>
</div>


@endsection