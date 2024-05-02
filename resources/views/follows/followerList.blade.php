@extends('layouts.login')
@section('content')
<!-- フォロワーリスト -->
<div class="container">
    @if(count($posts) > 0)
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <a class="other-profile" href="{{ route('other.profile' , ['id' => $post->user->id]) }}"><!-- 相手のプロフィールページへの遷移 -->
                    <img src="{{ asset('storage/' . $post->user->images) }}" width="25" height="25">
                    </a>
                    <strong>{{ $post->user->username }}</strong>: {{ $post->post }}
                    <span>{{ $post->created_at->format('Y-m-d H:i:s') }}</span>

                </li>
            @endforeach
        </ul>
    @else
    @endif
</div>

@endsection