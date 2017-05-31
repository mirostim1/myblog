@extends('layouts.blog-home')

@section('posts')
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <h2>
                <a href="{{ route('home.post', $post->slug) }}">{{ $post->title }}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{ $post->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at->diffForHumans() }}</p>
            <hr>
            <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="" />
            <hr>
            <p>{{ str_limit($post->body, 150) }}</p>
            <br>
            <a class="btn btn-primary pull-right" href="{{ route('home.post', $post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <br><br>
            <hr>
        @endforeach
    @else
        No posts for display.
    @endif
@endsection