@extends('layouts.logout')

@section('content')

<div class="added-container" id="clear">
  <div class="added">
    <!-- 新規登録したユーザー名をセッションで取得 -->
    <p class="added-text">{{session('username')}}さん</p>
    <p class="added-text">ようこそ！AtlasSNSへ！</p><br>
    <p class="added-text">ユーザー登録が完了しました。</p>
    <p class="added-text">早速ログインをしてみましょう!</p><br>
    <div class="added-btn">
    <button type="input" class="btn btn-danger"><a href="/login">ログイン画面へ</a></button>
    </div>
  </div>
</div>

@endsection