@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}
<div class="login-container">
    <div class="login-block">
        <p class="home">AtlasSNSへようこそ</p>
        <div class="login-form">
            <div class="login-form-mail">{{ Form::label('メールアドレス') }}{{ Form::text('mail',null,['class' => 'input']) }}</div>
            <div class="login-form-pass">{{ Form::label('パスワード') }}{{ Form::password('password',['class' => 'input']) }}</div>
            <div class="login-btn">
            <button type="input" class="btn btn-danger">{{ Form::submit('ログイン') }}</button>
            </div>
            <a href="/register"><p>新規ユーザーの方はこちら</p></a>
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection
