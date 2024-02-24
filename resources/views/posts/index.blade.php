@extends('layouts.login')

@section('content')
<div class="contaner">
    {!! Form::open(['url' => '/posts']) !!}
<div class="post">
<img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
<!-- <input type="image" name="images" value=""><img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25"> -->

    {!! Form::text('content',null,['required','class' => 'form-control','placeholder' => '投稿内容を入力してください'])!!}
    <div class = "button">
        <button type = "submit"><img class="post-btn" src="images/post.png" width="25" height="25"></button>
    </div>
</div>
{!! Form::close() !!}

</div>


@endsection