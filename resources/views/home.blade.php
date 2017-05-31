@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    Welcome to Home Page!
                    <br><br>
                    @if(Auth::guest())
                        <a href="{{ route('home.posts', ['category' => 'All']) }}">View all posts</a>
                    @endif

                    @if(Auth::user())
                        <a href="{{ route('home.posts', ['category' => 'All']) }}">View all posts</a><br><br>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.index') }}">Admin Area</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
