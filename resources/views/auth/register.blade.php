@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
<div class="register-container">
    <div class="register-block">
        <p class="register">新規ユーザー登録</p>
        <div class="username">{{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}
        @if ($errors->has('username'))
        <span class="error-message">{{ $errors->first('username') }}</span>
        @endif
        </div>
        <div class="mail">{{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        @if ($errors->has('mail'))
        <span class="error-message">{{ $errors->first('mail') }}</span>
        @endif
        </div>
        <div class="password">{{ Form::label('パスワード') }}
        {{ Form::password('password',null,['class' => 'input']) }}
        @if ($errors->has('password'))
        <span class="error-message">{{ $errors->first('password') }}</span>
        @endif
        </div>
        <div class="password-confirmation">{{ Form::label('パスワード確認') }}
        {{ Form::password('password_confirmation',null,['class' => 'input']) }}
        @if ($errors->has('password'))
        <span class="error-message">{{ $errors->first('password') }}</span>
        @endif
        </div>
        <div class="submit">
        <button type="input" class="btn btn-danger">{{ Form::submit('新規登録') }}</button>
        </div>
        <div class="login-page">
            <p><a class="register" href="/login">ログイン画面に戻る</a></p>
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection
