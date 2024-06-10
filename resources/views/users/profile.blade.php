@extends('layouts.login')
@section('content')
<div class="container">
    <div class="update">
        {!! Form::open(['url' => route('profile.update'), 'files' => true]) !!}
        @csrf
        {{ Form::hidden('id', Auth::user()->id) }}
        <img class="update-icon" src="{{ asset('storage/' . Auth::user()->images) }}" alt="User Icon" width="25" height="25">
        <div class="update-form">
            <div class="update-block">
                <label for="name">ユーザー名</label>
                <input type="text" name="username" value="{{ Auth::user()->username }}">
            </div>
            <div class="update-block">
                <label for="mail">メールアドレス</label>
                <input type="email" name="mail" value="{{ Auth::user()->mail }}">
            </div>
            <div class="update-block">
                <label for="pass">パスワード</label>
                <input type="password" name="password">
            </div>
            <div class="update-block">
                <label for="confirm-pass">パスワード確認</label>
                <input type="password" name="password_confirmation">
            </div>
            <div class="update-block">
                <label for="name">自己紹介</label>
                <input type="text" name="bio" value="{{ Auth::user()->bio }}">
            </div>
            <div class="update-block">
                <label for="name">アイコン画像</label>
                <input type="file" name="images">
            </div>
            <input type="submit" class="btn btn-danger" value="更新">
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection