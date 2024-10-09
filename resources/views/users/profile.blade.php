
@extends('layouts.login')
@section('content')
<div class="update-container">
        {!! Form::open(['url' => route('profile.update'), 'files' => true]) !!}
        @csrf
        {{ Form::hidden('id', Auth::user()->id) }}
    <div class="update">
        <div class="icon">
        @if(empty(Auth::user()->images) || Auth::user()->images === 'icon1.png')
                <!-- 画像が設定されていない、またはicon1.pngの場合デフォルト画像を表示 -->
                <img class="update-icon" src="{{ asset('images/icon1.png') }}" alt="Default User Icon" width="25" height="25">
            @else
                <!-- 登録された画像を表示 -->
                <img class="update-icon" src="{{ asset('storage/' . Auth::user()->images) }}" alt="User Icon" width="25" height="25">
            @endif
        </div>
        <div class="update-form">
            <div class="update-block">
                <label for="name">ユーザー名</label>
                <div class="update-block-br">
                <input type="text" name="username" value="{{ Auth::user()->username }}">
                @if ($errors->has('username'))
                <span class="error-message">{{ $errors->first('username') }}</span>
                @endif
                </div>
            </div>
            <div class="update-block">
                <label for="mail">メールアドレス</label>
                <div class="update-block-br">
                <input type="email" name="mail" value="{{ Auth::user()->mail }}">
                @if ($errors->has('mail'))
                <span class="error-message">{{ $errors->first('mail') }}</span>
                @endif
                </div>
            </div>
            <div class="update-block">
                <label for="pass">パスワード</label>
                <div class="update-block-br">
                <input type="password" name="password">
                @if ($errors->has('password'))
                <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
                </div>
            </div>
            <div class="update-block">
                <label for="confirm-pass">パスワード確認</label>
                <div class="update-block-br">
                <input type="password" name="password_confirmation">
                @if ($errors->has('password'))
                <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
                </div>
            </div>
            <div class="update-block">
                <label for="name">自己紹介</label>
                <div class="update-block-br">
                <input type="text" name="bio" value="{{ Auth::user()->bio }}">
                @if ($errors->has('max'))
                <span class="error-message">{{ $errors->first('max') }}</span>
                @endif
                </div>
            </div>
            <div class="update-block">
                <label for="name">アイコン画像</label>
                <div class="update-block-br">
                <input class="new-icon" type="file" name="images">
                @if ($errors->has('image'))
                <span class="error-message">{{ $errors->first('image') }}</span>
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="update-btn">
        <input type="submit" class="btn btn-danger" value="更新">
    </div>
    {!! Form::close() !!}
</div>
@endsection
