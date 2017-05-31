@extends('layouts.admin')


@section('content')

    @include('includes.tinyeditor')

    <h1>Create Post</h1>
    <p>In this section you can create post for publish.</p>
    <hr>

    @include('includes.form_error')

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
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
        {!! Form::select('category_id', [''=>'Choose Category'] + $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Upload Photo') !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>
        {!! Form::hidden('user_id', $user->id) !!}
    <div class="form-group">
        {!! Form::submit('Submit Post', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

@stop


