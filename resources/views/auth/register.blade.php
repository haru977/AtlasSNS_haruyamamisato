@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
<div class="register-container">
    <p class="home">新規ユーザー登録</p>
    <div class="register-block">
        <div class="username">{{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}</div>
    </div>
    <div class="mail">{{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="password">{{ Form::label('パスワード') }}
        {{ Form::text('password',null,['class' => 'input']) }}
    </div>
    <div class="password_confirmation">{{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
    </div>
    <div class="submit">{{ Form::submit('登録') }}</div>
    <p><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}

@endsection
