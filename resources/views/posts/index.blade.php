@extends('layouts.login')

@section('content')
<div class="post-container">
    {!! Form::open(['url' => '/posts']) !!}
    <div class="post">
        <div class="post-form">
            <div class="top-icon">
            @if(Auth::user()->images === 'icon1.png')
        <!-- 画像がicon1.pngの場合、icon1.pngを表示 -->
        <img src="{{ asset('images/icon1.png') }}" alt="Default Icon" width="25" height="25">
    @else
        <!-- それ以外の画像の場合、登録された画像を表示 -->
        <img src="{{ asset('storage/' . Auth::user()->images) }}" alt="User Icon" width="25" height="25">
    @endif
            </div>
            <div class="post-text">{!! Form::text('content',null,['required','class' => 'form-control','placeholder' => '投稿内容を入力してください'])!!}</div>
        </div>
        <div class="post-btn">
            <input class="post-btn" type="image" src="images/post.png" width="25" height="25">
        </div>
    </div>
    {!! Form::close() !!}
    <div class="posts-form">
        <ul class="posts">
    <!-- 投稿内容一覧表示のためのループを開始↓ -->
        @foreach ($posts as $post)
            <li class="posts-item">
                <div class="posts-box">
                    <img src="{{ asset('storage/' . $post->user->images) }}" alt="{{ $post->user->username }}'s Icon" width="25" height="25">
                <!-- postカラムの値（投稿内容）を表示↓ -->
                    <span class="post-name">{{ $post->user->username }}</span>
                    <span class="post-time">{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
                <p class="posts">{{ $post->post }}</p>
            <!-- ログインユーザーの投稿にのみ編集、削除ボタンを表示 -->
                @if($post->user_id === Auth::user()->id)
            <!-- 編集ボタン -->
                <div class="modal-btn">
                    <a class="js-modal-open" href="#" post="{{ $post->post }}" post_id="{{ $post->id }}">
                    <img class="edit-btn" src="images/edit.png" width="25" height="25"></a>
            <!-- 削除ボタン -->
                    <a class="delete" href="/posts/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいですか？')">
                    <img class="delete-btn" src="images/trash.png" width="25" height="25"></a>
                </div>
                @endif
            </li>
        <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="{{ route('posts.update',['id' => $post->id]) }}" method="post">
                <textarea name="edit" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">
                <div class="modal-edit">
                    <input type="image" class="modal-edit-btn" src="images/edit.png" width="25" height="25">
                </div>
                {{ csrf_field() }}<!-- CSRF保護機能 -->
            </form>
        </div>
    </div>
    @endforeach
    </ul>
</div>
</div>

@endsection