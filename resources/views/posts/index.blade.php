@extends('layouts.login')

@section('content')
<div class="contaner">
    <h2>機能を実装していきましょう。</h2>
<div class="post">
    <input type="image" name="images" value="{{Auth::user()->images}}">
    <from action = "/" meshod="post"></from>
    <input type = "text">
    <div class = "button">
        <button type = "submit"><img class="post-btn" src="images/post.png"></button>
</div>
</div>

</div>


@endsection