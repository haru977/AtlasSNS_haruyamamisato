@extends('layouts.login')

@section('content')
<div class="contaner">
    {!! Form::open(['url' => '/posts/index']) !!}
<div class="post">
<input type="image" name="images" value="{{Auth::user()->images}}">
    {!! Form::input('text','newPost',null,['required','class' => 'form-control','placeholder' => '投稿内容を入力してください'])!!}
    <div class = "button">
        <button type = "submit"><img class="post-btn" src="images/post.png"></button>
    </div>
</div>
{!! Form::close() !!{}}

</div>


@endsection