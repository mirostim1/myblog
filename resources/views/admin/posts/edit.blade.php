@extends('layouts.admin')


@section('content')

    @include('includes.tinyeditor')

    <h1>Edit Post</h1>
    <p>In this section you can edit post.</p>
    <hr>

    @include('includes.form_error')
    <div class="col-md-3">
        <img class="img img-responsive" src="{{$post->photo ? asset($post->photo->file) : asset('images/nophoto.gif')}}" alt="" />
    </div>
    <div class="col-md-9">
        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Enter Post Title*') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body', 'Enter Post Content*') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Choose Category*') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Upload Photo') !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::hidden('user_id', $post->user->id) !!}
        <div class="form-group">
            {!! Form::submit('Update Post', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop