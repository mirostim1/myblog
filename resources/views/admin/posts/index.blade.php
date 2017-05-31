@extends('layouts.admin')


@section('content')

    @if(session('post_deleted'))
        <div class="alert alert-success">{{session()->pull('post_deleted')}}</div>
    @endif

    @if(session('post_created'))
        <div class="alert alert-success">{{session()->pull('post_created')}}</div>
    @endif

    @if(session('post_updated'))
        <div class="alert alert-success">{{session()->pull('post_updated')}}</div>
    @endif


    <h1>Posts</h1>
    <p>Section contains list of all posts. You can view, edit or delete them.</p>
    <hr>


        @if(count($posts) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#Id</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Post link</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Delete post</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->photo?$post->photo->file:'/images/nophoto.png'}}" width="55px" height="40px" /></td>
                    <td><a href="{{route('admin.users.edit', $post->user->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category?$post->category->name:'Uncategorized'}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 20, '...')}}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">View post</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                    <td>{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}</td>
                    {!! Form::close() !!}
                </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <h2>No posts for display</h2>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                {{$posts->render()}}
            </div>
        </div>
@stop
