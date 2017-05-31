@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@stop

@section('content')

    {{--
    @if(session('post_deleted'))
        <div class="alert alert-success">{{session()->pull('post_deleted')}}</div>
    @endif
    --}}

    <h1>Upload Media</h1>
    <p>You can upload photo here.</p>
    <hr>

    {!!  Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone']) !!}

    {!!  Form::close() !!}


@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@stop