@extends('layouts.login')
@section('content')
<!-- フォロワーリスト -->
<div class="container">
    @if(count($posts) > 0)
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <img src="{{ asset('storage/'.Auth::user()->images) }}" width="25" height="25">
                    <strong>{{ $post->user->username }}</strong>: {{ $post->post }}
                    <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>

                </li>
            @endforeach
        </ul>
    @else
    @endif
</div>

@endsection