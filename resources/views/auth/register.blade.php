@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
<div class="register-container">
    <div class="register-block">
    <p class="register">新規ユーザー登録</p>
        <div class="username">{{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}
    </div>
    <div class="mail">{{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="password">{{ Form::label('パスワード') }}
        {{ Form::text('password',null,['class' => 'input']) }}
    </div>
    <div class="password-confirmation">{{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
    </div>
    <div class="submit">
        <button type="input" class="btn btn-danger">{{ Form::submit('登録') }}</button></div>
    <p><a href="/login">ログイン画面へ戻る</a></p>
    </div>
</div>

{!! Form::close() !!}

@endsection
