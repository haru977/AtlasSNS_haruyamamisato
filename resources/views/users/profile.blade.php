@extends('layouts.login')

@section('content')
<div class="contaner">
    <div class="update">
        {!! Form::open(['url'=>'/profile/update'])!!}
        @csrf
        {{Form::hidden('id',Auth::user()->id)}}
        <img class="update-icon" src="images/icon1.png">
        <div class="update-form">
            <div class="update-block">
                <label for="name">user name</label>
                <input type="text" name="username" value="{{Auth::user()->username}}">
            </div>
            <div class="update-block">
                <label for="mail">mail address</label>
                <input type="email" name="mail" value="{{Auth::user()->mail}}">
            </div>
            <div class="update-block">
                <label for="pass">password</label>
                <input type="password" name="password">
            </div>
            <div class="update-block">
                <label for="confirm-pass">password confirm</label>
                <input type="password" name="confirm_password">
            </div>
            <div class="update-block">
                <label for="name">bio</label>
                <input type="text" name="bio" value="{{Auth::user()->bio}}">
            </div>
            <div class="update-block">
                <label for="name">icon image</label>
                <input type="file" name="images">
            </div>
            <input type="submit" class="btn btn-danger">
            {{Form::token()}}
            {!! Form::close()!!}
        </div>
    </div>
</div>


@endsection