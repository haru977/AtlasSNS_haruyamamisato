@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => '/posts']) !!}
    <div class="post">
        <img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
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
        <li>
        <img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
        <!-- postカラムの値（投稿内容）を表示↓ -->
        <strong>{{ $post->user->username }}</strong>: {{ $post->post }}
        <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
        <button type = "button" class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
            <img class="edit-btn" src="images/edit.png" width="25" height="25"></button>
        <button type = "submit">
            <img class="delete-btn" src="images/trash.png" width="25" height="25"></button>
    </li>
        @endforeach
        <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="text" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}<!-- CSRF保護機能 -->
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
    </ul>
</div>
</div>

@endsection